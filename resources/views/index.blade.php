@extends('layouts.impact')

@section('title')
Trang chủ
@endsection

@section('content')
<!-- start home slider -->
    <div class="slider-area an-1 hm-1">
         <!-- slider -->
		<div class="bend niceties preview-2">
			<div id="ensign-nivoslider" class="slides">	
				<img src="{{asset('images/slider1.jpg')}}" alt="" title="#slider-direction-1"  />
				<img src="{{asset('images/slider2.png')}}" alt="" title="#slider-direction-2"  />
				<img src="{{asset('images/slider3.jpg')}}" alt="" title="#slider-direction-3"  />
			</div>
			<!-- direction 1 -->
			<div id="slider-direction-1" class="t-cn slider-direction">
				<div class="slider-progress"></div>
				<div class="slider-content t-cn s-tb slider-1">
					<div class="title-container s-tb-c title-compress">
						<h2 class="title1" style="color: Beige;">Đơn giản, tiện lợi</h2>
						<a class="btn-title" href="{{route('product.index')}}" style="background-color: Beige;">Khám phá ngay!</a>
					</div>
				</div>	
			</div>
			<!-- direction 2 -->
			<div id="slider-direction-2" class="slider-direction">
				<div class="slider-progress"></div>
				<div class="slider-content t-lfl s-tb slider-2 lft-pr">
					<div class="title-container s-tb-c">
						<h2 class="title1" style="color: Beige;">Trải nghiệm mua sắm trực tuyến</h2>
						<a class="btn-title" href="{{route('product.index')}}" style="background-color: Beige;">Bắt đầu ngay!</a>
					</div>
				</div>	
			</div>
			<!-- direction 2 -->
			<div id="slider-direction-3" class="slider-direction">
				<div class="slider-progress"></div>
				<div class="slider-content t-lfl s-tb slider-3 lft-pr">
					<div class="title-container s-tb-c">
						<h2 class="title1" style="color: Beige;"> Hiện đại, thân thiện</h2>
						<a class="btn-title" href="{{route('product.index')}}" style="background-color: Beige;">Click ngay!</a>
					</div>
				</div>	
			</div>
		</div>
		<!-- slider end-->
	</div>
<!-- end home slider -->
<!-- product section start -->
		<div class="our-product-area">
			<div class="container">
				<!-- area title start -->
				<div class="area-title">
					<h2>Our products</h2>
				</div>
				<!-- area title end -->
									<!-- our-product area start -->
				<div class="row">
					<div class="col-md-12">
						<div class="features-tab">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs">
								<li role="presentation" class="active"><a href="#home" data-toggle="tab">Bestsellers</a></li>
								<li role="presentation"><a href="#profile" data-toggle="tab">Random Products</a></li>
							</ul>
							<!-- Tab pans -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane fade in active" id="home">
									<div class="row">
										<div class="features-curosel">
										@foreach($products as $p)
											<div class="col-lg-12 col-md-12">
												<!-- single-product start -->
												<div class="single-product first-sale">
													<?php $discount = $p->discount;
													$old_price = $p->price;
													$new_price = $old_price;
													?>
													@if($discount)
														@foreach($discount as $d)
															<span class="sale-text" style="color: red;" >SALE!</span>
															<?php 
																$new_price-= ($new_price)*($d->discount_percent)/100;
															?>
														@endforeach
													@endif
													<div class="product-img">
														<a href="{{route('product.show', $p->id)}}">
															<img class="primary-image" src="{{$p->image}}" alt="{{$p->name}}" />
														</a>
														@if($old_price!=$new_price)
														<div class="price-box">
															<span class="new-price" style="text-decoration: line-through;">{{number_format($old_price)}}VND</span><br>
															<span class="new-price">{{number_format($new_price)}}VND</span>
														</div>
														@else
														<div class="price-box">
															<span class="new-price">{{number_format($old_price)}}VND</span>
														</div>
														@endif
													</div>
													<div class="product-content">
														<h2 class="product-name"><a href="#">{{$p->name}}</a></h2>
														<p>{{$p->short_description}}</p>
													</div>
												</div>
												<!-- single-product end -->
											</div>
										@endforeach
										</div>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane fade" id="home">
									<div class="row">
										<div class="features-curosel">
											<div class="col-lg-12 col-md-12">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>				
					</div>
				</div>
				<!-- our-product area end -->	
			</div>
		</div>
		<!-- product section end -->
		
@endsection

