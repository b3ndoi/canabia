<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CartRepo;

class OrderController extends Controller
{
    public function index(){
        $orders = CartRepo::with(['products'])->latest()->get();


        return view('orders.index', compact('orders'));
        
    }
    public function show($id){
        $order = CartRepo::with(['products'])->findOrFail($id);

        $total = 0;

        foreach($order->products as $product){
            $total += $product->product_price*$product->product_count;
        }

        return view('orders.show', compact('order', 'total'));
        
    }

    public function changeOrderStatus(Request $request, $id){
        $order = CartRepo::findOrFail($id);
        $order->delivered = !$order->delivered;
        $order->save();

        return $order->delivered?1:0;
    }
}
