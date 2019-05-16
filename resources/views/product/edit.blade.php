@extends('layouts.impact')

@section('title')
Sửa thông tin sản phẩm
@endsection

@section('master')
Sửa thông tin sản phẩm
@endsection

@section('content')

<?php 
$detail = $product->productdetail
?>

<div class="container">
	<div class="row">
		<div>
			<form method="post" action="{{route('product.update', $product->id)}}">
				{{ csrf_field() }}
				<h3>Thông tin cơ bản</h3>
				<div class="row">
					<br>
					<div class="col-sm-4">
						<strong>Tên sản phẩm: </strong>
						<input type="text" name="name" value="{{$product->name}}" required="true" /> 
					</div>
					<div class="col-sm-4">
						<strong>Mã sản phẩm:</strong>
						<input type="text" name="product_id" value="{{$product->product_id}}" required="true"/>
					</div>
					<div class="col-sm-4">
						<strong>Loại sản phẩm:</strong>
						<input type="text" name="type" value="{{$product->type}}" required="true"/><br>
					</div>
					<br>
					<br>
					<div class="col-sm-6">
						<strong>Mô tả ngắn gọn: </strong><br>
						<textarea name="short_description" rows="15" cols="65" required="true">{{$product->short_description}}</textarea><br>
						<br>
					</div>
					<div class="col-sm-6">
						<strong>Mô tả chi tiết: </strong><br>
						<textarea name="long_description" rows="15" cols="65" required="true">{{$detail->long_description}}</textarea><br>
						<br>
					</div>
					<div class="col-sm-4">
						<strong>Số lượng: </strong>
						<input type="text" name="amount" value="{{$product->amount}}" required="true"/>	
					</div>
					<div class="col-sm-4">
						<strong>Giá tiền:</strong>
						<input type="text" name="price" value="{{$product->price}}" required="true"/><br>	
					</div>
				</div>
				<br>
				<h3>Thông tin khác</h3>
				<br>
				<div class="row">
					<div class="col-sm-4">
						<strong>Xuất xứ:</strong>
						<input type="text" name="origin" value="{{$detail->origin}}" required="true"/>
					</div>
					<div class="col-sm-4">
						<strong>Kích cỡ:</strong>
						<input type="text" name="size" value="{{$detail->size}}"/>
					</div>
					<div class="col-sm-4">
						<strong>Màu sắc:</strong>
						<input type="text" name="color" value="{{$detail->color}}"/>
					</div>
					<br>
					<br>
					<div class="col-sm-4 col-sm-offset-1">
						<strong>Chiều dài:</strong>
						<input type="text" name="length" value="{{$detail->length}}"/>
					</div>
					<div class="col-sm-4 col-sm-offset-1">
						<strong>Cân nặng:</strong>
						<input type="text" name="weight" value="{{$detail->weight}}"/>
					</div>
					<br>
					<br>
				</div>
		  		<input type="submit" name="" value="Cập nhật" class="btn btn-success" />
		  		<input type="reset" name="" value="Nhập lại" class="btn btn-warning" />
			</form>	
		</div>
	</div>
</div>

@endsection