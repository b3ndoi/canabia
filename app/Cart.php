<?php

namespace App;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    protected $table = 'cart';
    public function __construct($oldCart){
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $variation){
        
        $storedItem = $item;
        $storedItem->variation_id = $variation->id;
        $storedItem->amount = $variation->amount;
        $storedItem->price = $variation->price;
        if($this->items){
            if(array_key_exists($variation->id, $this->items)){
                
                $storedItem = $this->items[$variation->id];
                $storedItem->count++;
            }else{
                $storedItem->count = 1;
            }
        }else{
            $storedItem->count = 1;
        }
        $this->items[$variation->id] = $storedItem;
        $this->totalPrice += $storedItem['price'];
        $this->totalQty++;
    }
    public function remove($item, $variation){
        
        if($this->items){
            if(array_key_exists($variation->id, $this->items)){
                unset($this->items[$variation->id]);
                $this->totalPrice -= ($item['price']*$item['count']);
                $this->totalQty--;
            }
        }
    }


    public function getItems(){
        
        $items = collect($this->items);
        return $items;
    }
}