<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StaticController extends Controller
{
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
