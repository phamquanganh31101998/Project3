@extends('layouts.impact')

@section('title')
Gửi phản hồi
@endsection

@section('content')
<?php 
$userinfo = $user->userinfo;
?>

@section('master')
Gửi phản hồi
@endsection

@if($userinfo->isAdmin == false)
	@if($userinfo->isLocked == 0)
		<div class="actions-e">
			<form action="{{route('feedback.send', $user->id)}}" method="post">
			{{ csrf_field() }}
			<div class="container">
				<div class="row">
					<strong style="font-size: 1.25vw;">Tên người gửi: </strong>
					<input style="font-size: 1.25vw;" type="text" name="" value="{{$userinfo->fullname}}" disabled="true"><br>
					<strong style="font-size: 1.25vw;" >Nội dung:<br></strong>
					<textarea style="font-size: 1.25vw;" name="feedback" rows="10" cols="100" required="true"></textarea><br>
					<input type="submit" name="" value="Gửi nhận xét" class="btn btn-success btn-lg">
				</div>
			</div>
			</form>
		</div>
	@else
		<div class="container">
			<div class="row">
				<h4 style="color: red;">Không thể gửi phản hồi do tài khoản bị khóa :(. Hãy 
			liên hệ với admin</h4>
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