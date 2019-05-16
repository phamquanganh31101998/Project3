<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    //
    protected $table = 'feedback';
    public $timestamps = false;
    const pheduyet = 1;
    const khongpheduyet = 0;

    public static $feedback_isApproved = [
    	self::pheduyet=>'Có', 
    self::khongpheduyet => 'Không'];

    protected $fillable = ['user_id', 'feedback', 'answer', 'isApproved'];

    public function user(){
    	return $this->hasOne(User::class, 'id', 'user_id');
    }
}
