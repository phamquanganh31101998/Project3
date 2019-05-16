@extends('layouts.impact')

@section('title')
Chi tiết đơn hàng
@endsection

@section('master')
Chi tiết đơn hàng số {{$order->id}}
@endsection

@section('content')
@if(Auth::user()->userinfo->isAdmin == 1)
	<div class="container">
		<!-- Shopping Cart Table -->
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="cart-table">
						<thead>
							<tr>
								<th>Sản phẩm</th>
								<th>Tên sản phẩm</th>
								<th>Số lượng</th>
								<th>Giá trị</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$orderdetail = $order->orderdetail;
							?>
							@foreach($orderdetail as $o)
							<tr>
								<td><a href="{{route('product.show', $o->product_id)}}"><img src="{{asset($o->product->image)}}" class="img-responsive" alt=""/></a>
								</td>
								<td><h5>{{$o->product->name}}</h5></td>
								<td><h5>{{$o->amount}}</h5></td>
								<td><h5>{{number_format($o->price)}}</h5></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- Shopping Cart Table -->
	</div>	
	@if($order->status == 0)
	<div class="container">
		<div class="row">
			<h6>Xử lý đơn hàng: <strong>(Lưu ý: Không thể hủy hành động đã chọn)</strong></h6>
			<span><a class="btn btn-success" href="{{route('order.accept', $order->id)}}">Chấp nhận đơn hàng</a></span>
			<span><a class="btn btn-danger" href="{{route('order.cancel', $order->id)}}">Hủy đơn hàng</a></span>
		</div>
	</div>
	@endif
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

