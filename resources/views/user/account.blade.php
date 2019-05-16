@extends('layouts.impact')

@section('title')
Quản lý tài khoản
@endsection

@section('master')
Tài khoản của tôi
@endsection

@section('content')
@if (session('success'))
<div class="container">
	<div class="row">
		<div class="alert alert-success">
		    <h3>{{ session('success') }}</h3>
		</div>
	</div>
</div>
@endif
@if(Auth::user())

<?php
$userinfo = $user->userinfo;
?>
<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<p style="font-size: 1.2vw;"><strong>Tài khoản: </strong>{{$user->username}}</p>
			<p style="font-size: 1.2vw;"><strong>Email: </strong>{{$user->email}}</p>
			<p style="font-size: 1.2vw;"><strong>Tên đầy đủ: </strong>{{$userinfo->fullname}}</p>
			<p style="font-size: 1.2vw;"><strong>Số điện thoại:</strong> 0{{$userinfo->phone_number}}</p>
			<p style="font-size: 1.2vw;"><strong>Địa chỉ: </strong>{{$userinfo->address}}</p>
			<p style="font-size: 1.2vw;"><strong>Chức vụ: </strong>{{App\UserInfo::$userinfo_isAdmin[$userinfo->isAdmin]}}</p>
			<p style="font-size: 1.2vw;"><strong>Status: </strong>{{App\UserInfo::$userinfo_isLocked[$userinfo->isLocked]}}</p>
		</div>
		<div class="col-sm-3">
			<a href="{{route('user.edit', $user->id)}}" class="btn btn-info btn-block btn-lg" role="button">Sửa thông tin</a>
			<br>
			@if($userinfo->isAdmin === 1)
				<button class="btn btn-danger btn-block btn-lg" disabled="true">Không thể xóa tài khoản Admin</button>
			@else
				{!!Form::open([
					'route' => ['user.destroy', $user->id],
					'method' => 'DELETE',
					'style' =>'display:inline'
					])

					!!}
					
					<button class="btn btn-danger btn-block btn-lg">Xóa tài khoản</button>

				{!!Form::close()!!}
				<br>
				<a href="{{route('cart.index')}}" class="btn btn-default btn-block btn-lg" role="button">Đến giỏ hàng của tôi</a>
				<br>
				<a href="{{route('order.indexForCustomer')}}" class="btn btn-default btn-block btn-lg" role="button">Theo dõi đơn hàng của tôi</a>
				<br>
			@endif
		</div>
	</div>
</div>
@else
<div class="container">
	<div class="row">
		<h2>Sorry</h2>
		<strong>Bạn phải đăng nhập mới có thể thực hiện chức năng này :( </strong>
	</div>
</div>
@endif
@endsection