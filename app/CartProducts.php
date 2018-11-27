<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class CartProducts extends Model
{
    public function product(){
        return belongsTo('App\Product', 'product_id');
    }
    public function cart(){
        return belongsTo('App\Cart', 'cart_id');
    }
}
