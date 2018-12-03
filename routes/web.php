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

Route::get('/', 'StaticController@homepage');

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

    Route::get('/orders', 'OrderController@index')->name('orders.index');
    Route::get('/orders/{id}', 'OrderController@show')->name('orders.show');
    Route::post('/orders/{id}', 'OrderController@changeOrderStatus')->name('orders.status');

    Route::get('/newsletters', 'NewsletterController@index')->name('newsletter.index');
    Route::get('/newsletter', 'NewsletterController@export')->name('newsletter.export');
    Route::get('/newsletter/{id}', 'NewsletterController@delete')->name('newsletter.delete');
});


Route::post('/newsletter', 'NewsletterController@store')->name('newsletter.store');

Route::get('/contact-us', 'StaticController@contactShow')->name('contact.show');
Route::post('/contact-us', 'StaticController@contactStore')->name('contact.store');

Route::get('/about-us', 'StaticController@aboutShow')->name('about.show');

Route::get('/product-list', 'ProductController@indexFront')->name('product.indexFront');
Route::get('/product/{slug}', 'ProductController@show')->name('product.show');


Route::get('/my-cart', 'CartController@myCart')->name('cart.my_cart');
Route::get('/checkout', 'CartController@checkout')->name('cart.checkout');
Route::post('/checkout', 'CartController@checkoutSubmit')->name('cart.checkout_submit');

Route::post('/add-to-cart/{id}/{var_id}', 'CartController@addToCart')->name('product.add_to_cart');
Route::post('/update-cart', 'CartController@updateCart')->name('product.update_cart');
Route::post('/remove-from-cart/{id}/{var_id}', 'CartController@removeFromCart')->name('product.remove_from_cart');
Route::get('/cart', 'CartController@currentCart')->name('cart.current_cart');

