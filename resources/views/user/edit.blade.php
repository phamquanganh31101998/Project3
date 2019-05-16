@extends('layouts.impact')

@section('title')
Sửa thông tin tài khoản
@endsection

@section('content')
<?php 
$userinfo = $user->userinfo;
?>

@section('master')
Sửa thông tin tài khoản
@endsection

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<p style="font-size: 1.2vw"><strong>Tên tài khoản: </strong></p>
			<p style="font-size: 1.2vw"><strong>Email:</strong></p>
			<p style="font-size: 1.2vw"><strong>Tên đầy đủ:</strong></p>
			<p style="font-size: 1.2vw"><strong>Địa chỉ:</strong></p>
			<p style="font-size: 1.2vw"><strong>Số điện thoại: </strong></p>
		</div>
		<div class="col-md-3">
			<form style="font-size: 1.2vw" method="post" action="{{route('user.update', $user->id)}}">
			{{ csrf_field() }}
			<p style="font-size: 1.2vw"><input type="text" 
				name="username" readonly="true" value="{{$user->username}}"/>
			</p>
			<p style="font-size: 1.2vw;"><input type="text" 
				name="email" readonly="true" value="{{$user->email}}"/></p>
			<p style="font-size: 1.2vw;"><input type="text" 
				name="fullname" value="{{$userinfo->fullname}}"/></p>
			<p style="font-size: 1.2vw;"><input type="text" 
				name="address" value="{{$userinfo->address}}"/></p>
			<p style="font-size: 1.2vw;"><input type="text" 
				name="phone_number" value="{{$userinfo->phone_number}}"/></p>
			<p style="font-size: 1.2vw;">
				<input type="submit" name="" value="Cập nhật" class="btn btn-success">
				<input type="reset" name="" value="Xóa thông tin" class="btn btn-danger">
			</p>
		</form>
		</div>
	</div>
</div>


@endsection