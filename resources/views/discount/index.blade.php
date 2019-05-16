@extends('layouts.impact')

@section('title')
Khuyến mại
@endsection

@section('master')
Quản lý khuyến mại
@endsection

@section('content')

<div class="container">
	<div class="row">
		<h1>Khuyến mại</h1>
	</div>
</div>
@if (session('success'))
<div class="container">
	<div class="row">
		<div class="alert alert-success">
		    <h3>{{ session('success') }}</h3>
		</div>
	</div>
</div>
@endif
@if(Auth::user()->userinfo->isAdmin == 1)

<div class="container">
	<table style="width: 100%; border: 1px solid black">
		<tr>
			<th><i>Mã sản phẩm</i></th>
			<th><i>Tên sản phẩm</i></th>
			<th><i>Phần trăm</i></th>
			<th><i>Xóa</i></th>
		</tr>
		@foreach($discounts as $d)
		<tr>
			<th>{{$d->product_id}}</a></th>
			<th>{{$d->product->name}}</th>
			<th>{{$d->discount_percent}}</th>
			<th><a href="{{route('discount.delete', $d->id)}}"><i class="fa fa-times"></i></a></th>
		</tr>
		@endforeach
	</table>
</div>

<div class="container">
	<div class="row">
		<div class="col-12">
			<form method="post" action="{{route('discount.create')}}">
				{{ csrf_field() }}
				<br><br><h4>Tạo chương trình khuyến mại</h4><br>
				<p>Tên sản phẩm:</p>
				<select name="product_id" required="true">
					<?php $products = App\Product::all();?>
					@foreach($products as $p)
						<option value="{{$p->product_id}}">{{$p->name}}</option>
					@endforeach
					<br><br>
				</select>
				<p>Phần trăm: </p>
				<input type="number" name="discount_percent" required="true" min="1" max="100" placeholder="%"><br><br>
				<input type="submit" name="" value="Tạo chương trình khuyến mại" class="btn btn-success btn-lg">
			</form>
		</div>
	</div>
</div>
@else
<div class="container">
	<div class="row">
		<img src="{{asset('images/sorryadmin.jpg')}}" width="100%" height="100%" style="text-align: center;">
	</div>
	<div class="gap" style="margin: 100px;">
	
	</div>
</div>
@endif
@endsection