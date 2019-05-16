@extends('layouts.impact')

@section('title')
Quản lý đơn hàng
@endsection

@section('content')

@section('master')
Quản lý đơn hàng
@endsection

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
	@if (session('cannotfind'))
		<div class="container">
			<div class="row">
				<div class="alert alert-danger">
				    <h3>{{ session('cannotfind') }}</h3>
				</div>
			</div>
		</div>
	@endif
	<div class="container">
		<h2>Tìm kiếm đơn hàng: </h2>
		<form action="{{route('order.search')}}" method="post" >
			{{ csrf_field() }}
			Tìm kiếm: <input type="text" name="id" placeholder="Nhập mã đơn hàng tại đây"/>
			<input type="submit" name="" value="Tìm kiếm" class="btn btn-primary"></input>
		</form>
	</div>
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
								<td><p style="font-size: 14px;">{{$o->id}}</p></td>
								<td><p style="font-size: 14px;">{{$o->fullname}}</p></td>
								<td><p style="font-size: 14px;">{{$o->address}}</p></td>
								<td><p style="font-size: 14px;">0{{$o->phone_number}}</p></td>
								<td><p style="font-size: 14px;">{{$o->total_amount}}</p></td>
								<td><p style="font-size: 14px;">{{number_format($o->total_price)}}</p></td>
								<td><p style="font-size: 14px;">{{App\Order::$order_status[$o->status]}}</p></td>
								<td><a href="{{route('order.show', $o->id)}}" class="btn btn-primary btn-block">Xem chi tiết đơn hàng</a></td>
							</tr>
							@endforeach
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- Shopping Cart Table -->
	</div>	
@else
<div class="container">
	<div class="row">
		<img src="{{asset('images/sorrycustomer.jpg')}}" width="100%" height="100%" style="text-align: center;">
	</div>
	<div class="gap" style="margin: 100px;">
	
	</div>
</div>
@endif
@endsection

