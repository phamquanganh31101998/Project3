<!-- header area start -->
		<header class="short-stor">
			<div class="container-fluid">
				<div class="row" style="text-align: right; margin-right: 50px; 	">
					
				</div>
				<div class="row">
					<!-- logo start -->
					<div class="col-md-3 col-sm-12 text-center nopadding-right">
						<div class="top-logo">
							<a href="{{route('homepage')}}"><img src="{{asset('img/logo.gif')}}" alt="" /></a>
						</div>
					</div>
					<!-- logo end -->
					<!-- mainmenu area start -->
					<div class="col-md-6 text-center">
						<div class="mainmenu">
							<nav>
								<ul>
									<li class="expand"><a href="{{route('product.index')}}">Sản phẩm</a>
										<ul class="restrain sub-menu">
											<li><?php $category = 'qa'?><a href="{{route('product.category', compact(['category']))}}">Quần áo</a></li>

											<li><?php $category = 'ta'?><a href="{{route('product.category', compact(['category']))}}">Tạ</a></li>

											<li><?php $category = 'xa'?><a href="{{route('product.category', compact(['category']))}}">Xà</a></li>

											<li><?php $category = 'ht'?><a href="{{route('product.category', compact(['category']))}}">Hỗ trợ</a></li>
										</ul>
									</li>
									<li class="expand"><a href="{{route('user.account')}}">Quản lý tài khoản</a></li>
									<li class="expand"><a href="{{route('cart.index')}}">Giỏ hàng</a></li>
									<li class="expand"><a href="{{route('order.indexForCustomer')}}">Theo dõi đơn hàng</a></li>
									<li class="expand"><a href="#">Phản hồi</a>
										<ul class="restrain sub-menu">
											<li><a href="{{route('feedback.showForm')}}">Gửi phản hồi</a></li>
											<li><a href="{{route('feedback.showForCustomer')}}">Xem Review</a></li>
										</ul>	
									</li>
								</ul>
							</nav>
						</div>
					</div>
					<!-- mainmenu area end -->
					<!-- top details area start -->
					<div class="col-md-1 col-sm-12 nopadding-left">
						<div class="top-detail">
							<!-- search divition start -->
							<div class="disflow">
								<div class="header-search expand">
									<div class="search-icon fa fa-search"></div>
									<div class="product-search restrain">
										<div class="container nopadding-right">
											<form action="{{route('product.search')}}" id="searchform" method="get">
												{{ csrf_field() }}
												<div class="input-group">
													<input type="text" name="value" class="form-control" placeholder="Nhập tên sản phẩm tại đây...">
													<span class="input-group-btn">
														<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
													</span>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<!-- search divition end -->
							<div class="disflow">
								<div class="expand dropps-menu">
									<a href="#"><i class="fa fa-align-right"></i></a>
									<ul class="restrain language">
										<li><a href="{{route('order.index')}}">Quản lý đơn hàng</a></li>
										<li><a href="{{route('product.index')}}">Quản lý mặt hàng</a></li>
										<li><a href="{{route('feedback.index')}}">Quản lý phản hồi</a></li>
										<li><a href="{{route('user.index')}}">Quản lý các tài khoản</a></li>
										<li><a href="{{route('discount.index')}}">Quản lý các chương trình khuyến mại</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- top details area end -->
					<div class="col-md-2">
						<br>
						@if(Auth::user())
							<form action="{{route('logout')}}" method="post">
								{{ csrf_field() }}
								Xin chào, {{Auth::user()->username}}
								<input type="submit" name="" value="Logout" class="btn btn-default">
							</form>
						@else
							<a class="nav-link btn btn-success" href="{{ route('login') }}">{{ __('Login') }}</a>
							<a class="nav-link btn btn-info" href="{{ route('register') }}">{{ __('Register') }}</a>
						@endif
					</div>
				</div>
			</div>
		</header>
		<!-- header area end -->
		