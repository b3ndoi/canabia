<?php

namespace App\Http\Controllers;

use App\Newsletter;
use Illuminate\Http\Request;
use Validator;
use App\Exports\NewsletterExport;
use Maatwebsite\Excel\Facades\Excel;

class NewsletterController extends Controller
{
    public function index(){
        $newsletters = Newsletter::latest()->get();

        return view('newsletters.index', compact('newsletters'));
    }

    public function store(Request $request){
        
        $request->validate([
            'email' => 'required|email|unique:newsletters,email',
            'full_name' => 'required'
        ]);

        $newsletter = new Newsletter;
        $newsletter->email = $request->email;
        $newsletter->full_name = $request->full_name;
        $newsletter->save();

        return 'success';
    }

    public function export() 
    {
        return Excel::download(new NewsletterExport, 'newsletter.xlsx');
    }
}
