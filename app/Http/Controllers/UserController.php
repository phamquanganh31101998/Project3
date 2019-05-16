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
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth', ['except'=>[]]);
    }
    
    public function index(){
    	$users = User::all();
    	return view('user.index', compact('users'));
    }

    public function show($id){
    	$user = User::find($id);
    	return view('user.show')->with('user', $user);
    }

	public function changeStatus($user_id){
    	$user = UserInfo::where('user_id','=',$user_id)->first();
    	if ($user->isLocked == 1){
    		$user->isLocked = 0;
    	}
    	else
    		$user->isLocked = 1;
    	$user->save();
    	return $this->index();
    }

    public function search(Request $request){
    	$user = User::where('username', '=', $request->username)->first();
    	if($user==null){
    		return redirect()->route('user.index')->with('cannotfind', 'Không có tài khoản ban vừa nhập');
    	}
    	else{
    		//return view('user.show')->with('user', $user);
            return $this->show($user->id);
		}
    }

    public function showPersonalAccount(){
        $user = User::where('id','=',Auth::user()->id)->first();
        return view('user.account')->with('user', $user);
    }

    public function edit(Request $request){
        $user = User::find($request->id);
        return view('user.edit')->with('user', $user);
    }

    public function update(Request $request){
        $user = User::find($request->id);
        $userinfo = $user->userinfo;
        DB::beginTransaction();
        try{
            $userinfo->fullname = $request->fullname;
            $userinfo->phone_number = $request->phone_number;
            $userinfo->address = $request->address;
            $userinfo->save();
            
        }
        catch(Exception $e){
            DB::rollback();
            throw $e;
        }
        DB::commit();
        return redirect()->route('user.account')->with('success','Sửa thông tin thành công');
    }

    public function destroy(Request $request){
        $user = User::find($request->id);
        $userinfo = $user->userinfo;
        $cart = $user->cart;
        DB::beginTransaction();
        try{
            $user->delete();
            $userinfo->delete();
            $cart->delete();
        }
        catch(Exception $e){
            DB::rollback();
            throw $e;
        }
        DB::commit();
        return redirect()->route('login');
    }
}
