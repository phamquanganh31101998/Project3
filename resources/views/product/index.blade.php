@extends('layouts.impact')

@section('title')
Danh sách các mặt hàng
@endsection

@section('content')

@if (session('cannotfind'))
<div class="container">
	<div class="row">
		<div class="alert alert-danger">
		    <h3>{{ session('cannotfind') }}</h3>
		</div>
	</div>
</div>
@endif

@if (session('success'))
<div class="container">
	<div class="row">
		<div class="alert alert-success">
		    <h3>{{ session('success') }}</h3>
		</div>
	</div>
</div>
@endif

<!-- shop-with-sidebar Start -->
<div class="shop-with-sidebar">
	<div class="container">
		<div class="row">
			<!-- left sidebar start -->
			<div class="col-md-3 col-sm-12 col-xs-12 text-left">
				<div class="topbar-left">
					<aside class="widge-topbar">
						<div class="bar-title">
							<div class="bar-ping"><img src="img/bar-ping.png" alt=""></div>
							<h2>Shop by</h2>
						</div>
					</aside>
					<aside class="sidebar-content">
						<div class="sidebar-title">
							<h6>Categories</h6>
						</div>
						<ul class="sidebar-tags">
							<li><?php $category = 'qa'?><a href="{{route('product.category', compact(['category']))}}">Quần áo</a></li>

							<li><?php $category = 'ta'?><a href="{{route('product.category', compact(['category']))}}">Tạ</a></li>

							<li><?php $category = 'xa'?><a href="{{route('product.category', compact(['category']))}}">Xà</a></li>

							<li><?php $category = 'ht'?><a href="{{route('product.category', compact(['category']))}}">Hỗ trợ</a></li>
						</ul>
					</aside>
					
					<aside class="widge-topbar">
						<div class="bar-title">
							<div class="bar-ping"><img src="img/bar-ping.png" alt=""></div>
							<h2>Popular Tags</h2>
						</div>
						<div class="exp-tags">
							<div class="tags">
								<a href="#">Quần áo</a>
								<a href="#">Xà</a>
								<a href="#">Hỗ trợ</a>
								<a href="#">Tạ</a>
								<a href="#">Thực phẩm bổ sung</a>
								<a href="#">Chương trình tập luyện</a>
							</div>
						</div>
					</aside>
				</div>
			</div>
			<!-- left sidebar end -->
			<!-- right sidebar start -->
			<div class="col-md-9 col-sm-12 col-xs-12">
				
				<!-- product-row start -->
				<div class="tab-content">
					
					<!-- list view -->
					<div class="tab-pane fade in active" id="shop-list-tab">
						<div class="list-view">
							@foreach($products as $p)
							<?php $discount = $p->discount;
							$old_price = $p->price;
							$new_price = $old_price;
							?>
							@if($discount)
								@foreach($discount as $d)
									<?php 
										$new_price-= ($new_price)*($d->discount_percent)/100;
									?>
								@endforeach
							@endif
							<!-- single-product start -->
								<div class="product-list-wrapper">
									<div class="single-product">	 							
										<div class="col-md-4 col-sm-4 col-xs-12">
											<div class="product-img">
												<a href="{{route('product.show', $p->id)}}" 
																class="btn">
													<img src="{{asset($p->image)}}" alt="{{$p->name}}" width="250px" height="250px">
												</a>
											</div>									
										</div>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<div class="product-content">
												<h2 class="product-name">
													<a href="{{route('product.show', $p->id)}}">{{$p->name}}</a>
												</h2>
												<div class="rating-price">	
													<div class="pro-rating">
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
													</div>
													<div class="product-desc">
														<p>{{$p->short_description}}</p>
													</div>
													@if($old_price!=$new_price)
													<div>
														<p><strong>Giá tiền:</strong> {{number_format($new_price)}}VND</p>
														<h5><strong style="color: red;">KHUYẾN MẠI!!!</strong></h5>
													</div>
													@else
													<div>
														<p><strong>Giá tiền:</strong> {{number_format($old_price)}}VND</p>
													</div>
													@endif
												</div>
												<br>
												
												<div class="actions-e">
													<div class="action-buttons">
														<div class="add-to-cart">
															<a href="{{route('product.show', $p->id)}}" 
																class="btn btn-info">Chi tiết
															</a>
														</div>
													</div>
												</div>
											</div>									
										</div>
									</div>
								</div>
								<!-- single-product end -->
							@endforeach
							<div class="container">
								<div class="row">
									<div class="col-sm-6">
										{!!$products->render()!!}
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			<!-- right sidebar end -->
		</div>
	</div>
</div>
<!-- shop-with-sidebar end -->



@if(Auth::user()->userinfo->isAdmin == 1)
<div class="container">
	<div class="row">
		<div>
			<a href="{{route('product.create')}}" class="btn btn-primary btn-lg">Thêm mặt hàng</a>
		</div>
	</div>
</div>

@endif
@endsection
