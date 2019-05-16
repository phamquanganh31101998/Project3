@extends('layouts.impact')

@section('title')
Thêm sản phẩm
@endsection

@section('content')

@section('master')
Tạo sản phẩm mới
@endsection

<div class="col-sm-6 col-sm-offset-3">

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
		'route'=>'product.store',
		'method' =>'POST',
		'class' => 'form-horizontal',
		'files' => 'true'
	])
		!!}
	
	<div class="form-group">
		{!!Form::label('name','Tên sản phẩm',['class'=>'control-label'])!!}
		{!!Form::text('name',null,['id'=>'name','class'=>'form-control','placeholder'=>'Tên sản phẩm', 'required'=>'true'])!!}
	</div>

	<div class="form-group">
        {!! Form::label('file', 'IMG File:') !!}
        {!! Form::file('file', ['id'=>'file', 'class' => 'field-select'] ) !!}
        
     </div>

	<div class="form-group">
		{!!Form::label('product_id','Mã sản phẩm',['class'=>'control-label'])!!}
		{!!Form::text('product_id',null,['id'=>'product_id','class'=>'form-control','placeholder'=>'Mã sản phẩm (chú ý: nên lấy theo 2 chữ ban đầu của loại sản phẩm)', 'required'=>'true'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('type','Loại',['class'=>'control-label'])!!}
		{!!Form::text('type',null,['id'=>'type','class'=>'form-control','placeholder'=>'Loại: Quần áo, tạ,...', 'required'=>'true'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('short_description','Mô tả ngắn gọn',['class'=>'control-label'])!!}
		{!!Form::text('short_description',null,['id'=>'short_description','class'=>'form-control','placeholder'=>'Mô tả ngắn gọn', 'required'=>'true'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('amount','Số lượng',['class'=>'control-label'])!!}
		{!!Form::text('amount',null,['id'=>'amount','class'=>'form-control','placeholder'=>'Nhập số lượng', 'required'=>'true'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('price','Giá tiền',['class'=>'control-label'])!!}
		{!!Form::text('price',null,['id'=>'price','class'=>'form-control','placeholder'=>'Giá tiền 1 sản phẩm', 'required'=>'true'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('origin','Xuất xứ',['class'=>'control-label'])!!}
		{!!Form::text('origin',null,['id'=>'origin','class'=>'form-control','placeholder'=>'Lào, Campuchia,...', 'required'=>'true'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('long_description','Mô tả chi tiết',['class'=>'control-label'])!!}
		{!!Form::text('long_description',null,['id'=>'long_description','class'=>'form-control','placeholder'=>'Your long_description', 'required'=>'true'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('size','Kích cỡ',['class'=>'control-label'])!!}
		{!!Form::text('size',null,['id'=>'size','class'=>'form-control','placeholder'=>'Lớn, nhỏ, S, M, L, XL'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('weight','Cân nặng',['class'=>'control-label'])!!}
		{!!Form::text('weight',null,['id'=>'weight','class'=>'form-control','placeholder'=>'kg,...'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('length','Chiều dài',['class'=>'control-label'])!!}
		{!!Form::text('length',null,['id'=>'length','class'=>'form-control','placeholder'=>'cm,mm,m'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('color','Màu sắc',['class'=>'control-label'])!!}
		{!!Form::text('color',null,['id'=>'color','class'=>'form-control','placeholder'=>'Đen, trắng, hắc hường,...'])!!}
	</div>

	<div class="form-group">
		{!!Form::submit('Tạo sản phẩm',['class'=>'btn btn-success btn-lg'])!!}
	</div>

	{!! Form::close() !!}

				
</div>

@endsection