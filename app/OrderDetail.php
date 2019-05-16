<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    protected $table = 'order_detail';
    public $timestamps = false;
    protected $fillable = ['order_id', 'product_id', 'amount', 'price'];
    public function product(){
    	return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
