<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    //
    protected $table = 'discount';
    public $timestamps = false;
    protected $fillable = ['product_id', 'discount_percent'];
    public function product(){
    	return $this->hasOne(Product::class, 'product_id', 'product_id');
    }
}
