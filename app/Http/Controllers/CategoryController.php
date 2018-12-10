<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::latest()->get();
        return view('categories.index', compact('categories'));
    }

    public function create(){
        $categories = Category::whereNull('category_id')->get();
        return view('categories.create', compact('categories'));
    }
    public function store(Request $request){

        // $request->validate([
        //     'name' => 'required',
        // ]);
        $category = new Category;
        $category->name = $request->name;
        $category->category_id = $request->category_id;
        $category->save();
        return redirect('/admin/categories');
    }
    public function edit(Category $category){
        
        $categories = Category::whereNull('category_id')->get();
        return view('categories.edit', compact('category', 'categories'));
    }
    public function update(Category $category, Request $request){
        // $request->validate([
        //     'name' => 'required',
        // ]);
        $category->name = $request->name;
        $category->category_id = $request->category_id;
        $category->save();
        return redirect('/admin/categories');

    }
    public function destroy(Category $category){
        $category->products()->delete();
        $category->delete();
        return back();
    }
}
