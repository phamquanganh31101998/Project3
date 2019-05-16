@extends('layouts.impact')

@section('title')
Quản lý phản hồi
@endsection

@section('content')


@section('master')
Quản lý phản hồi khách hàng
@endsection

<?php 
$userinfo = Auth::user()->userinfo;
?>
@if($userinfo->isAdmin == 1)

@foreach($feedbacks as $f)

<div class="container">
	<div class="row">
		<div class="col-sm ">
		<p><strong>Khách hàng: </strong>{{$f->user->userinfo->fullname}}</p>
		<p><strong>Nội dung: </strong>{{$f->feedback}}</p>
		<p><strong>Trả lời: </strong>{{$f->answer}}</p>
		<p><strong>Hiển thị lên bảng tin?: </strong>{{App\Feedback::$feedback_isApproved[$f->isApproved]}}</p>
		<a href="{{route('feedback.show', $f->id)}}" class="btn btn-primary">Xem chi tiết</a>
		<hr>
		</div>
	</div>
</div>
@endforeach

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