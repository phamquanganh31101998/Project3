@extends('layouts.impact')

@section('title')
Thông tin tài khoản
@endsection

@section('master')
Quản lý các tài khoản
@endsection

@section('content')

<?php 
$userinfo = Auth::user()->userinfo;
?>
@if($userinfo->isAdmin == 1)

<?php
$userinfo = $user->userinfo;
?>

<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<p><strong>Tài khoản: </strong>{{$user->username}}</p>
			<p><strong>Email: </strong>{{$user->email}}</p>
			<p><strong>Tên đầy đủ: </strong>{{$userinfo->fullname}}</p>
			<p><strong>Số điện thoại: </strong>0{{$userinfo->phone_number}}</p>
			<p><strong>Địa chỉ: </strong>{{$userinfo->address}}</p>
			<p><strong>Chức vụ: </strong>{{App\UserInfo::$userinfo_isAdmin[$userinfo->isAdmin]}}</p>
			<p><strong>Status: </strong>{{App\UserInfo::$userinfo_isLocked[$userinfo->isLocked]}}</p>
		</div>
		<div class="col-sm-3">
			
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
			@if($userinfo->isAdmin === 1)
			<button type="button" class="btn btn-info" disabled="true">Khóa/Mở Khóa</button>
			@else
				<a href="{{route('user.status', $userinfo->user_id)}}" class="btn btn-info" role="button">Khóa/Mở Khóa</a>
			@endif
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