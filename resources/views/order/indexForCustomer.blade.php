@extends('layouts.impact')

@section('title')
Xem đơn hàng cá nhân
@endsection

@section('content')

@section('master')
Theo dõi đơn hàng
@endsection

@if(Auth::user()->userinfo->isAdmin == 0)
	@if($orders==null)
		<div class="container">
			<div class="row">
				<h3>Hiện tại bạn không có đơn hàng nào</h3>
			</div>
		</div>
	@else
	<div class="container">
		<!-- Shopping Cart Table -->
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="cart-table">
						<thead>
							<tr>
								<th>Mã đơn hàng</th>
								<th>Tên người nhận</th>
								<th>Địa chỉ</th>
								<th>Số điện thoại</th>
								<th>Tổng số lượng</th>
								<th>Tổng giá trị</th>
								<th>Trạng thái</th>
								<th>Chi tiết</th>
							</tr>
						</thead>
						<tbody>
							@foreach($orders as $o)
							<tr>
								<td>{{$o->id}}</td>
								<td>{{$o->fullname}}</td>
								<td>{{$o->address}}</td>
								<td>0{{$o->phone_number}}</td>
								<td>{{$o->total_amount}}</td>
								<td>{{number_format($o->total_price)}}</td>
								<td>{{App\Order::$order_status[$o->status]}}</td>
								<td><a href="{{route('order.showForCustomer', $o->id)}}" class="btn btn-primary btn-block">Xem chi tiết đơn hàng</a></td>
							</tr>
							@endforeach
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- Shopping Cart Table -->
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

