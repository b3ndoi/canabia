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
        $products = Product::all();
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
        $products = $products->with(['category', 'prices'])->latest()->paginate(4);
        $categories = Category::all();
        // return $products;
        return view('products_front.index', compact('products', 'categories'));
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
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::with('category')->where('slug', $slug)->first();
        $rel_price_low = $product->price - $product->price*.2;
        $rel_price_heigh = $product->price + $product->price*.2;
        $related_products = $product->category->products()->with('category')->where('id', '!=', $product->id)->whereBetween('price', [$rel_price_low, $rel_price_heigh])->latest()->get();
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
        $product = Product::with('category')->where('slug', $slug)->first();
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
        $product = Product::where('slug', $slug)->first();

        if($request->file('image')){
            if($product->image){
                $files = Storage::delete($product->image);
            }
            $path = $request->file('image')->store('public/products');
            $product->image = $path;
        }

        $product->name = $request->name;
        $product->slug = $product->generateSlug($request->name);
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }


    
}
