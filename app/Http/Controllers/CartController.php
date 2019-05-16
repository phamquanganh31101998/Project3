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
class CartController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth', ['except'=>[]]);
    }

    public function index(){
    	$user = Auth::user();
    	$userinfo = $user->userinfo;
    	$cart = Cart::where('user_id','=',$user->id)->first();
    	if ($userinfo->isAdmin == 1){
    		return view('cart.index');
    	}
    	else{
    		return view('cart.index', compact('cart'));
    	}
    }

    public function add(Request $request){
        //Tìm kiếm người dùng hiện tại
        $user = Auth::user();
        $userinfo = $user->userinfo;
        //Tìm giỏ hàng của người dùng
        $cart = Cart::where('user_id','=',$user->id)->first();
        //Tìm thông tin chi tiết của giỏ hàng
        $cartdetail = $cart->cartdetail;
        //Tìm xem sản phẩm thêm vào giỏ hàng đã có chưa
        $addedProduct = $cartdetail->where('product_id', '=', $request->product_id)->first();

        //Nếu sản phẩm đã có trong giỏ hàng thì thay đổi số lượng (tăng sản phẩm ở cart, giảm sản phẩm ở product)
        if($addedProduct){
            DB::beginTransaction();
            try{
                $cart->status = 1;
                $addedProduct->amount += $request->amount;
                $addedProduct->price = $request->price * $request->amount;
                $productInStock = $addedProduct->product;
                $productInStock->amount -= $request->amount;
                $addedProduct->save();
                $productInStock->save();
                $cart->save();
            }
            catch(Exception $e){
                DB::rollback();
                throw $e;
            }
           DB::commit(); 
        }
        //Nếu không có thì tạo mới
        else{
            DB::beginTransaction();
            try{
                CartDetail::create([
                    'cart_id' => $cart->id,
                    'product_id' => $request->product_id,
                    'amount' => $request->amount,
                    'price' => $request->price
                ]);
                $cart = Cart::where('user_id','=',$user->id)->first();
                $cartdetail = $cart->cartdetail;
                $addedProduct = $cartdetail->where('product_id', '=', $request->product_id)->first();
                $productInStock = $addedProduct->product;
                $productInStock->amount -= $request->amount;
                $productInStock->save();
                $cart->status = 1;
                $cart->save();
            }
            catch(Exception $e){
                DB::rollback();
                throw $e;
            }
           DB::commit(); 
        }
        return redirect()->route('product.show', $request->product_id)->with('success','Thêm vào giỏ thành công');
    }

    public function changeAmount(Request $request){
        $cart = Cart::where('user_id','=',Auth::user()->id)->first();
        $cartdetail = $cart->cartdetail;
        $productChanged = $cartdetail->where('product_id', '=', $request->id)->first();
        $productInStock = $productChanged->product;
        //Nếu số lượng mới lớn hơn số lượng cũ
        if ($request->newamount > $productChanged->amount){
            DB::beginTransaction();
            try{
                $diff = $request->newamount - $productChanged->amount;
                $productChanged->amount = $request->newamount;
                $productChanged->save();
                $productInStock->amount -= $diff;
                $productInStock->save();
            }
            catch(Exception $e){
                DB::rollback();
                throw $e;
            }
            DB::commit();
            return $this->index();
        }
        //Nếu số lượng mới nhỏ hơn số lượng cũ
        elseif ($request->newamount < $productChanged->amount) {
            DB::beginTransaction();
            try{
                $diff = $productChanged->amount - $request->newamount;
                $productChanged->amount = $request->newamount;
                $productChanged->save();
                $productInStock->amount += $diff;
                $productInStock->save();
            }
            catch(Exception $e){
                DB::rollback();
                throw $e;
            }
            DB::commit();
            return $this->index();
        }
        else{
            return $this->index();
        }

    }

    public function deleteProduct(Request $request){
        $productDeleted = CartDetail::where('product_id', '=', $request->id)->first();
        $productInStock = $productDeleted->product;
        $cart = $productDeleted->cart;
        DB::beginTransaction();
        try{
            $productInStock->amount+=$productDeleted->amount;
            $productInStock->save();
            $productDeleted->delete();
            //Kiểm tra giỏ hàng đã rỗng chưa
            $cartdetail = CartDetail::where('cart_id', '=', $cart->id)->first();
            if(!$cartdetail){
                $cart->status = 0;
            }
            $cart->save();
        }
        catch(Exception $e){
            DB::rollback();
            throw $e;
        }
        DB::commit();
        return $this->index();
    }

    public function deleteCart(Request $request){
        $cart = Cart::find($request->id);
        $cartdetail = $cart->cartdetail;
        DB::beginTransaction();
        try{
            foreach ($cartdetail as $c) {
                $productDeleted = $c->product;
                $productDeleted->amount += $c->amount;
                $productDeleted->save();
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
        return $this->index();
    }

}
