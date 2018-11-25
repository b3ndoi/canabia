<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
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

    public function addToCart(Request $request, $id){
        $product = Product::with('category')->where('id', $id)->first();
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        
        $request->session()->put('cart', $cart );

        $cart = $request->session()->get('cart');

        return $cart->items;
    }
    public function removeFromCart(Request $request, $id){
        $product = Product::with('category')->where('id', $id)->first();
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        
        $cart = new Cart($oldCart);
        $cart->remove($product, $product->id);
        
        $request->session()->put('cart', $cart );

        $cart = $request->session()->get('cart');

        return $cart->items;
    }
}
