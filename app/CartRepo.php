<?php

namespace App;



class CartRepo extends Model
{
    protected $table="cart";

    public function products(){
        return $this->hasMany('App\CartProducts', 'cart_id');
    }
}
