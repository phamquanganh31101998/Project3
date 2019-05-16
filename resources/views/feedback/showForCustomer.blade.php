@extends('layouts.impact')

@section('title')
Phản hồi
@endsection

@section('content')

@section('master')
Review của khách hàng
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


@foreach($feedbacks as $f)


<?php 
$userinfo = $f->user->userinfo;
?>

<div class="container">
	<div class="row">
		<div class="col-sm ">
		<p><strong>Khách hàng:</strong> {{$userinfo->fullname}}</p>
		<p><strong>Nội dung:</strong> {{$f->feedback}}</p>
		<p><strong>Trả lời:</strong> {{$f->answer}}</p>
		<hr>
		</div>
	</div>
</div>
@endforeach

@endsection