<?php

namespace App\Http\Controllers;

use App\Mail\NewOrder;
use App\Mail\NewOrderUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Product;
use App\Variaton;
use App\Cart;
use App\CartRepo;
use App\CartProducts;
use Session;
class CartController extends Controller
{
    public function currentCart(){
        $cart = Session::get('cart');
        
        return response()->json($cart?$cart->getItems():[]);
    }

    public function myCart(){

        $cart = Session::get('cart');

        return view('cart.show', compact('cart'));

    }

    public function addToCart(Request $request, $id, $var_id){
        $product = Product::with('category')->where('id', $id)->first();
        $variation = Variaton::find($var_id);
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        
        $cart = new Cart($oldCart);
        $cart->add($product, $variation, $request->count);
        
        $request->session()->put('cart', $cart );

        $cart = $request->session()->get('cart');

        return $cart->items;
    }
    public function removeFromCart(Request $request, $id, $var_id){
        $product = Product::with('category')->where('id', $id)->first();
        $variation = Variaton::find($var_id);
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        
        $cart = new Cart($oldCart);
        $cart->remove($product, $variation);
        
        $request->session()->put('cart', $cart );

        $cart = $request->session()->get('cart');

        return $cart->items;
    }
    public function updateCart(Request $request){
        
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        
        $cart = new Cart($oldCart);
        $cart->updateCartCount($request->products);
        return $request->all();
    }


    public function checkout(Request $request){
        
        $cart = Session::has('cart')? Session::get('cart'):null;
        if(!$cart){
            return redirect('/product-list');
        }
        return view('cart.checkout');
    }
    public function checkoutSubmit(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $cart = Session::get('cart');
        $cart = $cart->getItems();

        $cartStore = new CartRepo;
        $cartStore->first_name = $request->first_name;
        $cartStore->last_name = $request->last_name;
        $cartStore->email = $request->email;
        $cartStore->phone = $request->phone;
        $cartStore->save();

        foreach($cart as $product){
            $cart_product = new CartProducts;
            $cart_product->cart_id = $cartStore->id;
            $cart_product->product_id = $product['id'];
            $cart_product->product_name = $product['name'];
            $cart_product->product_price = $product['price'];
            $cart_product->product_amount = $product['amount'];
            $cart_product->product_unit = $product['unit'];
            $cart_product->product_count = $product['count'];
            $cart_product->save();
        }

        $message = $request->all();

        Mail::to($request->email)->send(new NewOrderUser(collect($cart), collect($request->all)));
        Mail::to('admin@test.com')->send(new NewOrder(collect($cart), collect($request->all)));

        $request->session()->forget('cart' );
        // if(!$cart){
        //     return redurect('/product-list');
        // }
        // $cart = $cart->getItems();
        
        return $request->all();
    }
}
