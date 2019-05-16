@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
	    <div class="col-md-8">
	        <div class="card">
				<div class="card-header" style="text-align: center;">ĐĂNG KÝ TÀI KHOẢN<br>Trở thành một phần của chúng tôi</div>

                <div class="card-body">
				@if (count($errors)>0)
					<div class="alert alert-danger">
						<strong>Whoops! </strong>There were some problems with your input<br><br>
						<ul>
							@foreach($errors->all() as $error)
							<li>
								{{$error}}
							</li>
							@endforeach
						</ul>
					</div>
					
				@endif

				{!! Form::open([
					'route'=>'user.store',
					'method' =>'POST',
					'class' => 'form-horizontal'
				])
					!!}
				
				<div class="form-group">
					{!!Form::label('username','Username',['class'=>'control-label'])!!}
					{!!Form::text('username',null,['id'=>'username','class'=>'form-control','placeholder'=>'Tên đăng nhập', 'required'=>'true'])!!}
				</div>

				<div class="form-group">
					{!!Form::label('password','Password',['class'=>'control-label'])!!}
					{{ Form::password('password', array('placeholder'=>'Mật khẩu', 'class'=>'form-control' ) ) }}
				</div>

				<div class="form-group">
					{!!Form::label('fullname','Fullname',['class'=>'control-label'])!!}
					{!!Form::text('fullname',null,['id'=>'fullname','class'=>'form-control','placeholder'=>'Tên đầy đủ', 'required'=>'true'])!!}
				</div>

				<div class="form-group">
					{!!Form::label('email','Email',['class'=>'control-label'])!!}
					{!!Form::text('email',null,['id'=>'email','class'=>'form-control','placeholder'=>'Email'])!!}
				</div>

				<div class="form-group">
					{!!Form::label('phone_number','Phone',['class'=>'control-label'])!!}
					{!!Form::text('phone_number',null,['id'=>'phone_number','class'=>'form-control','placeholder'=>'Số điện thoại'])!!}
				</div>
				<div class="form-group">
					{!!Form::label('address','Address',['class'=>'control-label'])!!}
					{!!Form::text('address',null,['id'=>'address','class'=>'form-control','placeholder'=>'Địa chỉ của bạn'])!!}
				</div>

				<div class="form-group">
					{!!Form::submit('Tạo tài khoản',['class'=>'btn btn-success btn-lg'])!!}
				</div>

				{!! Form::close() !!}
				</div>
	        </div>
	    </div>
	</div>
</div>
@endsection