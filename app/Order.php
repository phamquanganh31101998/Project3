<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'order';
    public $timestamps = false;
    const dangcho = 0;
    const xuly = 1;
    const huy = 2;
    public static $order_status = [
    	self::dangcho =>'Đang chờ xử lý',
    	self::xuly => 'Chấp nhận',
    	self::huy => 'Bị hủy'];
    protected $fillable = ['user_id', 'fullname', 'address', 'phone_number', 'total_amount', 'total_price', 'status'];
    public function orderdetail(){
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
