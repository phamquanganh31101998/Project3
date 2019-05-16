<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\UserInfo;
use App\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:20', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // User::create([
        //     'username' => $data['username'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);
        
        // return $this->createUser($data);
    }

    // protected function createUser(array $data){
    //     try {
    //         // Begin a transaction
    //         DB::beginTransaction();

    //         // Do something and save to the db...
    //         // User::create([
    //         // 'username' => $data['username'],
    //         // 'email' => $data['email'],
    //         // 'password' => Hash::make($data['password']),
    //         // ]);

    //         $user = User::where('username','=',$data['username'])->first();

    //         UserInfo::create([
    //         'user_id' => $user->id,
    //         'isAdmin' => '0',
    //         'isLocked' => '0',
    //         ]);

    //         Cart::create([
    //         'user_id' => $user->id,
    //         'status' => '0',
    //         ]);

    //         // Commit the transaction
    //         DB::commit();
    //     } catch (\Exception $e) {
    //         // An error occured; cancel the transaction...
    //         DB::rollback();

    //         // and throw the error again.
    //         throw $e;
    //     }
    //     finally{
    //         return redirect()->route('homepage');
    //     }
    // }
}
