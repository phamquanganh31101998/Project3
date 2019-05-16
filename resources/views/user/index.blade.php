@extends('layouts.impact')

@section('title')
Quản lý tài khoản
@endsection

@section('content')

<?php 
$userinfo = Auth::user()->userinfo;
?>
@if($userinfo->isAdmin == 1)

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
	<h2>Tìm kiếm tài khoản: </h2>
	<form action="{{route('user.search')}}" method="post" >
		{{ csrf_field() }}
		Tìm kiếm: <input type="text" name="username" placeholder="Nhập tài khoản"/>
		<input type="submit" name="" value="Tìm kiếm" class="btn btn-primary"></input>
	</form>
</div>
<hr>

<div class="container">
	<table style="width: 100%; border: 1px solid black">
		<tr>
			<th><i>Tài khoản</i></th>
			<th><i>Email</i></th>
			<th><i>Tên đầy đủ</i></th>
			<th><i>Số điện thoại</i></th>
			<th><i>Địa chỉ</i></th>
			<th><i>Vai trò</i></th>
			<th><i>Trạng thái</i></th>
			<th><i>Khóa/Mở Khóa</i></th>
		</tr>
		@foreach($users as $u)
		<?php
		$userinfo = $u->userinfo;
		?>
		<tr>
			<th><a href="{{route('user.show', $u->id)}}">{{$u->username}}</a></th>
			<th>{{$u->email}}</th>
			<th>{{$userinfo->fullname}}</th>
			<th>0{{$userinfo->phone_number}}</th>
			<th>{{$userinfo->address}}</th>
			<th>{{App\UserInfo::$userinfo_isAdmin[$userinfo->isAdmin]}}</th>
			<th> {{App\UserInfo::$userinfo_isLocked[$userinfo->isLocked]}}</th>
			@if($userinfo->isAdmin === 1)
			<th>
				<button type="button" class="btn btn-basic" disabled="true">Khóa/Mở Khóa</button>
			</th>
			@else
			<th>
				<a href="{{route('user.status', $userinfo->user_id)}}" type="button" class="btn btn-info">Khóa/Mở Khóa</a>
			</th>
			@endif
		</tr>
		@endforeach
	</table>
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