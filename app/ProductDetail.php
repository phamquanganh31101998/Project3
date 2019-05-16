<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    //
    protected $table = 'product_detail';
    public $timestamps = false;
    protected $fillable = ['product_id', 'origin', 'long_description', 'weight', 'size', 'length', 'color'];
}
