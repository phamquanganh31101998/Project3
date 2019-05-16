<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function userinfo(){
        return $this->hasOne(UserInfo::class, 'user_id', 'id');
    }

    public function feedback(){
        return $this->hasMany(Feedback::class, 'user_id', 'id');
    }

    public function cart(){
        return $this->hasOne(Cart::class, 'user_id', 'id');
    }

    public function order(){
        return $this->hasMany(Order::class, 'user_id', 'cart');
    }
}
