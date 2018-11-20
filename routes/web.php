<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $products = App\Product::with('category')->latest()->limit(9)->get();
    return view('static.homepage', compact('products'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/categories', 'CategoryController@index')->name('category.index');
Route::get('/categories/create', 'CategoryController@create')->name('category.create');
Route::get('/categories/{category}/edit', 'CategoryController@edit')->name('category.edit');
Route::put('/categories/{category}', 'CategoryController@update')->name('category.update');
Route::post('/categories', 'CategoryController@store')->name('category.store');

Route::get('/products/create', 'ProductController@create')->name('product.create');
Route::get('/products/{slug}/edit', 'ProductController@edit')->name('product.edit');
Route::put('/products/{slug}', 'ProductController@update')->name('product.update');
Route::post('/products', 'ProductController@store')->name('product.store');
Route::get('/products', 'ProductController@index')->name('product.index');

Route::get('/product-list', 'ProductController@indexFront')->name('product.indexFront');
Route::get('/product/{slug}', 'ProductController@show')->name('product.show');


Route::post('/add-to-cart/{id}', 'CartController@addToCart')->name('product.add_to_cart');
Route::post('/remove-from-cart/{id}', 'CartController@removeFromCart')->name('product.remove_from_cart');
Route::get('/cart', 'CartController@currentCart')->name('cart.current_cart');

Route::post('/newsletter', 'NewsletterController@store')->name('newsletter.store');
Route::get('/newsletters', 'NewsletterController@index')->name('newsletter.index');
Route::get('/newsletter', 'NewsletterController@export')->name('newsletter.export');