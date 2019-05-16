<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserInfo;
use App\Cart;
use App\CartDetail;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Order;
use App\OrderDetail;
class OrderController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth', ['except'=>[]]);
    }

    public function create(Request $request){
    	DB::beginTransaction();
    	try{
    		//Tạo 1 hàng trong bảng Order lưu thông tin khái quát
    		Order::create([
    			'user_id' => Auth::user()->id,
    			'fullname' => $request->fullname,
    			'address' => $request->address,
    			'phone_number' => $request->phone_number,
    			'total_amount' => $request->total_amount,
    			'total_price' => $request->total_price,
    			'status' => 0
    		]);
    		//Tìm thông tin giỏ hàng
    		$order = Order::all()->last();//thông tin đơn hàng mới nhất vừa tạo
    		$user = Auth::user();
    		$cart = $user->cart;
    		$cartdetail = $cart->cartdetail;
    		//Tạo các hàng trong bảng OrderDetail lưu thông tin chi tiết đơn hàng, rồi xóa giỏ hàng
    		foreach ($cartdetail as $c) {
                OrderDetail::create([
                	'order_id' => $order->id,
                	'product_id' => $c->product_id,
                	'amount' => $c->amount,
                	'price' => $c->price * $c->amount
                ]);
                $c->delete();
            }
            $cart->status = 0;
            $cart->save();
    	}
    	catch(Exception $e){
    		DB::rollback();
            throw $e;
    	}
    	DB::commit();
    	return redirect()->route('cart.index')->with('success', 'Đặt hàng thành công');
    }

    public function index(){
    	$orders = Order::all();
    	return view('order.index', compact('orders'));
    }

    public function show($id){
    	$order = Order::find($id);
    	return view('order.show', compact('order'));
    }

    public function accept(Request $request){
    	$order = Order::find($request->id);
    	$order->status = 1;
    	$order->save();
    	return redirect()->route('order.index')->with('success', 'Chấp nhận đơn hàng thành công');
    }

    public function cancel(Request $request){
    	$order = Order::find($request->id);
    	$orderdetail = $order->orderdetail;
    	DB::beginTransaction();
    	try{
    		$order->status = 2;
    		$order->save();
    		//Nếu hủy đơn hàng thì tăng số lượng sản phẩm 
    		foreach ($orderdetail as $o) {
    			# code...
    			$productInStock = $o->product;
    			$productInStock->amount += $o->amount;
    			$productInStock->save();
    		}
    	}
    	catch(Exception $e){
			DB::rollback();
            throw $e;
    	}
    	DB::commit();
    	return redirect()->route('order.index')->with('success', 'Hủy đơn hàng thành công');
    }
 	public function search(Request $request){
    	$order = Order::find($request->id);
    	if($order==null){
    		return redirect()->route('order.index')->with('cannotfind', 'Không có đơn hàng vừa nhập');
    	}
    	else{
            return $this->show($order->id);
		}
    }

    public function indexForCustomer(){
    	$orders = Order::where('user_id','=', Auth::user()->id)->get();
    	return view('order.indexForCustomer', compact('orders'));
    }

    public function showForCustomer($id){
    	$order = Order::find($id);
    	return view('order.showForCustomer', compact('order'));
    }
}
