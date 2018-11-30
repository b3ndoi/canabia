<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StaticController extends Controller
{
    public function homepage(){
        $products = \App\Product::with(['category', 'prices'])->latest()->limit(9)->get();
        $categories = \App\Category::has('products')->get();
        return view('static.homepage', compact('products', 'categories'));
    }
    public function aboutShow(){
        return view('static.about');
    }

    public function contactShow(){
        return view('static.contact');
    }
    public function contactStore(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        $message = $request->all();
        Mail::to('admin@test.com')->send(new ContactMail(collect($message)));

        return 'success';
        // return view('static.contact');
    }
}
