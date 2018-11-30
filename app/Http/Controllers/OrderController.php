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
}
