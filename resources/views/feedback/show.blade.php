@extends('layouts.impact')

@section('title')
Xử lý phản hồi
@endsection

@section('content')
<?php 
$userinfo = $feedback->user->userinfo;
?>
@if (session('processSuccess'))
<div class="container">
	<div class="row">
		<div class="alert alert-success">
		    <h3>{{ session('processSuccess') }}</h3>
		</div>
	</div>
</div>
@endif
@section('master')
Xử lý phản hồi
@endsection

@if(Auth::user()->userinfo->isAdmin == 1)
<div class="container">
	<div class="row">
		<div class="col-sm">
		<p><strong>Tên người gửi: </strong>{{$userinfo->fullname}}</p>
		<p><strong>Nội dung: </strong>{{$feedback->feedback}}</p>
		<form method="post" action="{{route('feedback.update', $feedback->id)}}">
			{{ csrf_field() }}
			<strong>Trả lời:</strong><br>
			<textarea name="answer" rows="10" cols="60">{{$feedback->answer}}</textarea>
			<br>
			<strong>Cho phép hiện lên bảng tin?</strong><br>
			<input type="radio" name="isApproved" value="1" checked> Có<br>
	  		<input type="radio" name="isApproved" value="0"> Không<br>
	  		<input type="submit" name="" value="Cập nhật" class="btn btn-success" />
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