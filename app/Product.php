<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'product';
    public $timestamps = false;
    protected $fillable =['product_id',	'name',	'type',	'image','short_description', 'amount', 'price'];
    public function productdetail(){
    	return $this->hasOne(ProductDetail::class, 'product_id', 'product_id');
    }
    public function discount(){
    	return $this->hasMany(Discount::class, 'product_id', 'product_id');
    }
}
