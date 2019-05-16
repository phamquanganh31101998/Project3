<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    //
    protected $table = 'cart_detail';
    public $timestamps = false;
    protected $fillable = ['cart_id', 'product_id', 'amount', 'price'];
    public function product(){
    	return $this->hasOne(Product::class, 'id', 'product_id');
    }
    public function cart(){
    	return $this->hasOne(Cart::class, 'id', 'cart_id');
    }
}
