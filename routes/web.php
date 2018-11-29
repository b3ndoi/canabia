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
    $products = App\Product::with(['category', 'prices'])->latest()->limit(9)->get();
    return view('static.homepage', compact('products'));
});

Auth::routes();


Route::middleware(['auth'])->prefix('admin')->group(function () {

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

    Route::get('/newsletters', 'NewsletterController@index')->name('newsletter.index');
    Route::get('/newsletter', 'NewsletterController@export')->name('newsletter.export');
});


Route::post('/newsletter', 'NewsletterController@store')->name('newsletter.store');

Route::get('/contact-us', 'StaticController@contactShow')->name('contact.show');
Route::post('/contact-us', 'StaticController@contactStore')->name('contact.store');

Route::get('/about-us', 'StaticController@aboutShow')->name('about.show');

Route::get('/product-list', 'ProductController@indexFront')->name('product.indexFront');
Route::get('/product/{slug}', 'ProductController@show')->name('product.show');


Route::get('/my-cart', 'CartController@myCart')->name('cart.my_cart');

Route::post('/add-to-cart/{id}/{var_id}', 'CartController@addToCart')->name('product.add_to_cart');
Route::post('/remove-from-cart/{id}/{var_id}', 'CartController@removeFromCart')->name('product.remove_from_cart');
Route::get('/cart', 'CartController@currentCart')->name('cart.current_cart');

