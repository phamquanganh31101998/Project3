<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\User;
use App\UserInfo;
use App\Http\Requests\UserFormRequest;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Cart;

class RegisterController extends Controller
{
    //
    public function create(){
    	return view('user.create');
    }

    public function store(UserFormRequest $request){
    	$username = $request->username;
    	$password = $request->password;
    	$fullname = $request->fullname;
    	$address = $request->address;
    	$phone = $request->phone_number;
    	$email = $request->email;
	    // Begin a transaction
	    DB::beginTransaction();
		try {
			// Do something and save to the db...
		    User::create([
    		'username' => $username,
    		'password' => Hash::make($password),
    		'email' => $email
	    	]);
	    	$user = User::where('username','=',$username)->first();
	    	UserInfo::create([
	    		'user_id' => $user->id,
	    		'fullname' => $fullname,
	    		'address' => $address,
	    		'phone_number' => $phone,
	    		'isAdmin' => '0',
	    		'isLocked' => '0'
	    	]);

            Cart::create([
            'user_id' => $user->id,
            'status' => '0',
            ]);
		    
		} catch (Exception $e) {
		    // An error occured; cancel the transaction...
		    DB::rollback();

		    // and throw the error again.
		    throw $e;
		}
		// Commit the transaction
		DB::commit();
		return redirect()->route('login');
    }
}
