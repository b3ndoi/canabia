<?php

namespace App;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart){
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id){
        
        $storedItem = $item;
        if($this->items){
            if(array_key_exists($id, $this->items)){
                
                $storedItem = $this->items[$id];
                $storedItem->count++;
            }else{
                $storedItem->count = 1;
            }
        }else{
            $storedItem->count = 1;
        }
        $this->items[$id] = $storedItem;
        $this->totalPrice += $storedItem['price'];
        $this->totalQty++;
    }
    public function remove($item, $id){
        
        if($this->items){
            if(array_key_exists($id, $this->items)){
                unset($this->items[$id]);
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