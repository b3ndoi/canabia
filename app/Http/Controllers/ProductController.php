<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Variaton;
use App\Cart;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['category', 'prices'])->latest()->get();
        return view('products.index', compact('products'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexFront(Request $request)
    {
        $products = Product::query();
        $query = [];
        $category = null;
        if($request->has('price_from')&&$request->has('price_to')){
            $products = $products->whereBetween('price', [$request->price_from, $request->price_to]);
            $query['price_from'] = $request->price_from;
            $query['price_to'] = $request->price_to;
        }
        if($request->has('category_id') && $request->category_id){
            $products = $products->where('category_id', $request->category_id);
            $category = Category::find($request->category_id);
            $query['category_id'] = $request->category_id;
        }
        if($request->has('search') && $request->search){
            $products = $products->where('name', 'LIKE', '%'.$request->search.'%');
            $query['search'] = $request->search;
        }
        $products = $products->with(['category', 'prices'])->latest()->paginate(4)->appends($query);
        $categories = Category::all();
        // return $products;
        return view('products_front.index', compact('products', 'categories', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'amount' => 'required',
            'unit' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ]);
        $product = new Product;
        $product->name = $request->name;
        $product->slug = $product->generateSlug($request->name);
        $product->description = $request->description;
        $product->price = $request->price[0];
        $product->amount = $request->amount[0];
        $product->unit = $request->unit;
        $path = $request->file('image')->store('public/products');
        $product->category_id = $request->category_id;
        $product->image = $path;
        $product->save();

        $vaiations = [];
        for ($i=0; $i < count($request->price); $i++) {
            array_push($vaiations, [
                'price' => $request->price[$i],
                'amount' => $request->amount[$i],
            ]);
        }
        foreach($vaiations as $vaiation){
            $var = new Variaton;
            $var->product_id = $product->id;
            $var->price =$vaiation['price'];
            $var->amount = $vaiation['amount'];
            $var->save();
        }
        return redirect('/admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::with(['category', 'prices'])->where('slug', $slug)->first();
        $rel_price_low = $product->price - $product->price*.2;
        $rel_price_heigh = $product->price + $product->price*.2;
        $related_products = $product->category->products()->with(['category', 'prices'])->where('id', '!=', $product->id)->whereBetween('price', [$rel_price_low, $rel_price_heigh])->latest()->get();
        return view('products_front.show', compact('product', 'related_products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {

        $categories = Category::all();
        $product = Product::with(['category', 'prices'])->where('slug', $slug)->first();
        return view('products.edit', compact('categories', 'product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'description' => 'required',
        //     'price' => 'required',
        //     'amount' => 'required',
        //     'unit' => 'required',
        //     'image' => 'required',
        //     'category_id' => 'required',
        // ]);
        $product = Product::where('slug', $slug)->first();

        if($request->file('image')){
            if($product->image){
                $files = Storage::delete($product->image);
            }
            $path = $request->file('image')->store('public/products');
            $product->image = $path;
        }
        $product->prices()->delete();

        $product->price = $request->price[0];
        $product->amount = $request->amount[0];
        $vaiations = [];
        for ($i=0; $i < count($request->price); $i++) {
            array_push($vaiations, [
                'price' => $request->price[$i],
                'amount' => $request->amount[$i],
            ]);
        }
        foreach($vaiations as $vaiation){
            $var = new Variaton;
            $var->product_id = $product->id;
            $var->price =$vaiation['price'];
            $var->amount = $vaiation['amount'];
            $var->save();
        }
        $product->amount = $request->amount[0];
        $product->slug = $product->generateSlug($request->name);
        $product->description = $request->description;
        $product->price = $request->price[0];
        $product->category_id = $request->category_id;
        $product->save();
        
        // $vaiations = [];
        // for ($i=0; $i < count($request->price); $i++) {
        //     array_push($vaiations, [
        //         'price' => $request->price[$i],
        //         'amount' => $request->amount[$i],
        //     ]);
        // }
        // foreach($vaiations as $vaiation){
        //     // $var = $product->prices()->where('price', $vaiation['price']);
        //     $var->product_id = $product->id;
        //     $var->price =$vaiation['price'];
        //     $var->amount = $vaiation['amount'];
        //     $var->save();
        // }
        return redirect('/admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $product = Product::where('id',$id)->first();
        $product->delete();
        return back();
    }


    
}
