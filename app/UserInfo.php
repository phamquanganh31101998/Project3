<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    //
    protected $table = 'user_info';
    public $timestamps = false;
    const quanly=1;
    const khachhang=0;
    const bikhoa=1;
    const hoatdong=0;
    public static $userinfo_isAdmin=[self::quanly=>'Quản lý', self::khachhang=>'Khách hàng'];
    public static $userinfo_isLocked=[self::hoatdong=>'Đang hoạt động', self::bikhoa=>'Bị khóa'];
    protected $fillable = ['user_id', 'isAdmin', 'fullname', 'phone_number', 'address', 'isLocked'];
}
