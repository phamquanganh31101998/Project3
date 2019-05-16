<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Product;
use App\ProductDetail;
use App\Http\Requests\ProductFormRequest;
use DB;
class ProductController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth', ['except'=>[]]);
    }
    
    public function index(){
    	$products = Product::paginate(4);
    	return view('product.index', compact('products'));
    }

    public function show($id){
    	$product = Product::find($id);
    	return view('product.show')->with('product', $product);
    }

    public function create(){
    	return view('product.create');
    }

    public function store(ProductFormRequest $request){
    	//dd($request->file);
    	if($request->hasFile('file')){
            $name = $request->name;
            $image = "images/".$request->file->getClientOriginalName();
            $product_id = $request->product_id;
            $type = $request->type;
            $short_description = $request->short_description;
            $amount = $request->amount;
            $price = $request->price;
            $origin = $request->origin;
            $long_description = $request->long_description;
            $size = $request->size;
            $weight = $request->weight;
            $length = $request->length;
            $color = $request->color; 
            
            // Begin a transaction
            DB::beginTransaction();
            try {

            // Do something and save to the db...
            Product::create([
                'name' => $name,
                'type' => $type,
                'image' => $image,
                'short_description' => $short_description,
                'amount' => $amount,
                'price' => $price,
                'product_id' => $product_id
            ]);
            ProductDetail::create([
                'product_id' => $product_id,
                'origin' => $origin,
                'long_description' => $long_description,
                'weight' => $weight,
                'size' => $size,
                'length' => $length,
                'color' => $color
            ]);

            $request->file->move('images', $request->file->getClientOriginalName());
            } catch (Exception $e) {
                // An error occured; cancel the transaction...
                DB::rollback();

                // and throw the error again.
                throw $e;
            }

            // Commit the transaction
            DB::commit();
                return redirect()->route('product.index')->with('success','Thêm sản phẩm thành công');

        }
    	else{
    		echo "Upload file failed";
    	}
    }

    public function edit(Request $request){
        $product = Product::find($request->id);
        return view('product.edit')->with('product', $product);
    }

    public function update(Request $request){
        $product = Product::find($request->id);
        $detail = $product->productdetail;
        DB::beginTransaction();
        try{
            $product->name = $request->name;
            $product->type = $request->type;
            $product->short_description = $request->short_description;
            $product->amount = $request->amount;
            $product->price = $request->price;
            $product->product_id = $request->product_id;
            $detail->product_id = $request->product_id;
            $detail->origin = $request->origin;
            $detail->long_description = $request->long_description;
            $detail->weight = $request->weight;
            $detail->size = $request->size;
            $detail->length = $request->length;
            $detail->color = $request->color;
            $product->save();
            $detail->save();
        }
        catch(Exception $e){
            DB::rollback();
            throw $e;
        }
        DB::commit(); 
        return redirect()->route('product.show', $request->id)->with('success', 'Đã sửa thành công');
    }

    public function search(Request $request){
        // $product = Product::where('product_id', '=', $request->value)->first();
        // if($product==null){
        //     return redirect()->route('product.index')->with('cannotfind', 'Không có mặt hàng có mã số bạn vừa nhập');
        // }
        // else{
        //     return $this->show($product->id);
        // }
        $products = Product::where('name','like',"%".$request->value."%")->paginate(4);
        if($products==null){
            return redirect()->route('product.index')->with('cannotfind', 'Không có mặt hàng bạn tìm kiếm');
        }
        else{
            return view('product.index', compact('products'));
        }
    }

    public function destroy($id){
        $product = Product::find($id);
        $detail = $product->productdetail;
        DB::beginTransaction();
        try{
            $product->delete();
            $detail->delete();
        }
        catch(Exception $e){
            DB::rollback();
            throw $e;
        }
        DB::commit();
        return redirect()->route('product.index')->with('success','Xóa sản phẩm thành công');
    }

    public function category(Request $request){
        //dd($request->category);
        $products = Product::where('product_id','like',$request->category."%")->paginate(4);
        return view('product.index', compact('products'));
    }
}
