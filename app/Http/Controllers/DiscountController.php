<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Discount;
use App\Http\Requests\DiscountFormRequest;
class DiscountController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth', ['except'=>[]]);
    }
    public function index(){
    	$discounts = Discount::all();
    	return view('discount.index', compact('discounts'));
    }
    public function create(DiscountFormRequest $request){
    	DB::beginTransaction();
        try{
            Discount::create([
            'product_id' => $request->product_id,
            'discount_percent' => $request->discount_percent
            ]);
        }
        catch(Exception $e){
            DB::rollback();
            throw $e;
        }
        DB::commit();
        return redirect()->route('discount.index')->with('success', 'Tạo khuyến mại thành công');
    }
    public function delete(Request $request){
        $discount = Discount::find($request->id);
        $discount->delete();
        return redirect()->route('discount.index')->with('success', 'Xóa khuyến mại thành công');
    }
}
