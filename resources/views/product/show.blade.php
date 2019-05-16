@extends('layouts.impact')

@section('title')
Thông tin chi tiết sản phẩm
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

<?php 
$detail = $product->productdetail;
$userinfo = Auth::user()->userinfo;
$discount = $product->discount;
$old_price = $product->price;
$new_price = $old_price;
?>
@if($discount)
	@foreach($discount as $d)
		<?php 
			$new_price -= ($new_price)*($d->discount_percent)/100;
		?>
	@endforeach
@endif
	<!-- product-details Area Start -->
		<div class="product-details-area">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-sm-5 col-xs-12">
						<div class="zoomWrapper">
							<div id="img-1" class="zoomWrapper single-zoom">
								<a href="#">
									<img id="zoom1" src="{{asset($product->image)}}" alt="{{$product->name}}">
								</a>
							</div>
							
						</div>
					</div>
					<div class="col-md-7 col-sm-7 col-xs-12">
						<div class="product-list-wrapper">
							<div class="single-product">
								<div class="product-content">
									<h2 class="product-name"><a href="#" style="font-size: 16px;">{{$product->name}}</a></h2>
									<div class="rating-price">	
										<div class="pro-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
										</div>
										@if($old_price!=$new_price)
											<div class="price-boxes">
												<span class="new-price">{{number_format($new_price)}}VND (Giá đã giảm)</span>
											</div>
										@else
											<div class="price-boxes">
												<span class="new-price">{{number_format($old_price)}}VND</span>
											</div>
										@endif
									</div>
									<div class="product-desc">
										<h5>{{$product->short_description}}</h5>
									</div>
									
									@if($product->amount > 0)
									<p class="availability in-stock"><strong>Tình trạng: </strong>
									<span>Còn {{$product->amount}} sản phẩm </span></p>
									@if($userinfo->isAdmin == 0)
										@if($userinfo->isLocked == 0)
											<div class="actions-e">
												<form action="{{route('cart.add')}}" method="post">
													{{ csrf_field() }}
													@if($old_price!=$new_price)
													<input type="hidden" name="price" value="{{$new_price}}">
													@else
													<input type="hidden" name="price" value="{{$old_price}}">
													@endif
													<input type="hidden" name="product_id" readonly="true" value="{{$product->id}}"><br>
													<p style="font-size: 1.2vw;">
													</p>
													<span style="font-size: 1.2vw">Chọn số lượng
														<input type="number" name="amount" max="{{$product->amount}}" min="1" required="true">
														<input type="submit" name="" value="Thêm vào giỏ hàng" class="btn" style="background-color: red; color: white;">
													</span>
												</form>
											</div>
										@else
											<div>
												<h5 style="color: red; ">Không thể thêm vào giỏ do tài khoản bị khóa :(. Hãy liên hệ với admin</h5>
											</div>
										@endif
									@endif
									@else
									<p class="availability in-stock">Tình trạng: <span style="color: red">Hết hàng</span></p>
									@endif
								</div>
							</div>
						</div>
						<div class="single-product-tab">
							  <!-- Nav tabs -->
							<ul class="details-tab">
								<li class="active"><a href="#home" data-toggle="tab">Mô tả chi tiết</a></li>
								<li class=""><a href="#messages" data-toggle="tab"> Thông tin khác</a></li>
							</ul>
							  <!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="home">
									<div class="product-tab-content">
										<p>{{$detail->long_description}}</p>	
									</div>
								</div>
								<div role="tabpanel" class="tab-pane" id="messages">
									<div>
										<p><strong>Mã sản phẩm:</strong> {{$product->product_id}}</p>
										<p><strong>Loại sản phẩm:</strong> {{$product->type}}</p>
										<p><strong>Số lượng:</strong> {{$product->amount}}</p>
										<p><strong>Xuất xứ:</strong> {{$detail->origin}}</p>
										@if($detail->size)
											<p><strong>Kích cỡ:</strong> {{$detail->size}}</p>
										@endif

										@if($detail->color)
											<p><strong>Màu sắc:</strong> {{$detail->color}}</p>
										@endif

										@if($detail->length)
											<p><strong>Chiều dài:</strong> {{$detail->length}}</p>
										@endif
										
										@if($detail->weight)
											<p><strong>Cân nặng:</strong> {{$detail->weight}}</p>
										@endif
									</div>
								</div>
							</div>					
						</div>
						
						@if($userinfo->isAdmin == 1)
							<div class="col-md">
							<a href="{{route('product.edit', $product->id)}}" 
								class="btn btn-primary">Sửa thông tin</a>
							{!!Form::open([
								'route' => ['product.destroy', $product->id],
								'method' => 'DELETE',
								'style' =>'display:inline'
								])

								!!}
								
								<button class="btn btn-danger">Xóa mặt hàng</button>

							{!!Form::close()!!}
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
		<!-- product-details Area end -->
@endsection