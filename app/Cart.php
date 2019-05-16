<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $table = 'cart';
    public $timestamps = false;
    const empty=0;
    const notEmpty=1;
    public static $cart_status=[
    	self::empty=>'Giỏ hàng trống', 
    	self::notEmpty=>'Có mặt hàng'];
    protected $fillable = ['user_id', 'status'];
    public function cartdetail(){
    	return $this->hasMany(CartDetail::class, 'cart_id', 'id');
    }
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
