@extends('layouts.impact')

@section('title')
Quản lý giỏ hàng
@endsection

@section('master')
Các sản phẩm trong giỏ hiện tại
@endsection

@section('content')
<?php 
$userinfo = Auth::user()->userinfo;
?>
@if (session('success'))
<div class="container">
	<div class="row">
		<div class="alert alert-success">
		    <h3>{{ session('success') }}</h3>
		</div>
	</div>
</div>
@endif

@if($userinfo->isAdmin == 0)
	@if($cart->status == 0)
	<div class="container">
		<div class="row" style="text-align: center;height: 50px">
			<h2 style="margin: 20px;" >Hiện tại giỏ hàng đang rỗng</h2>
		</div>
	</div>
	@else
	<!-- Shopping Table Container -->
		<div class="cart-area-start">
			<div class="container">
				<!-- Shopping Cart Table -->
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="cart-table">
								<thead>
									<tr>
										<th>Sản phẩm</th>
										<th>Tên sản phẩm</th>
										<th>Số lượng</th>
										<th>Giá 1 sản phẩm</th>
										<th>Tổng giá</th>
										<th>Thay đổi số lượng</th>
										<th>Xóa khỏi giỏ</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$cartdetail = $cart->cartdetail;
									$total_amount = 0;
									$total_price = 0;
									?>
									@foreach($cartdetail as $c)
									<?php 
									$total_amount += $c->amount;
									$total_price += $c->price * $c->amount;
									?>
									<tr>
										<td>
											<a href="{{route('product.show', $c->product_id)}}"><img src="{{asset($c->product->image)}}" class="img-responsive" alt=""/></a>
										</td>
										<td>
											<h6>{{$c->product->name}}</h6>
										</td>
										<td>{{$c->amount}}</td>
										<td>
											<div class="cart-price">{{number_format($c->price)}}</div>
										</td>
										<td>
											<div class="cart-price">{{number_format($c->price * $c->amount)}}</div>
										</td>
										<td>
											<form method="post" action="{{route('cart.changeAmount', $c->product_id)}}">
												{{ csrf_field() }}
												<input type="number" name="newamount" max="{{$c->product->amount}}" min="1" required="true" value="{{$c->amount}}"><br>
												<input type="submit" name="" class="btn btn-info" value="Thay đổi">
											</form>
										</td>
										<td><a href="{{route('cart.deleteProduct', $c->product_id)}}"><i class="fa fa-times"></i></a></td>
									</tr>
									@endforeach
									<tr>
										<td class="actions-crt" colspan="7">
											<div class="">
												<div class="col-md-4 col-sm-4 col-xs-4 align-left"><a class="cbtn" href="{{route('product.index')}}">Tiếp tục mua sắm </a></div>
												<div class="col-md-4 col-sm-4 col-xs-4 align-right"><a class="cbtn" href="{{route('cart.deleteCart', $cart->id)}}">Xóa tất cả sản phẩm</a></div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- Shopping Cart Table -->
				<!-- Shopping Coupon -->
				<div class="row">
					<div class="col-md-12 vendee-clue">
						
					</div>
					<br>
					<!-- Shopping Coupon -->
				<div class="row">
					<div class="col-md-12 vendee-clue">
						<!-- Shopping Totals -->
						<div class="shipping coupon cart-totals">
							<ul>
								<li class="cartSubT">Tổng số lượng sản phẩm   <span>{{$total_amount}}</span></li>
								<li class="cartSubT">Tổng giá trị đơn hàng   <span>{{number_format($total_price)}}</span></li>
							</ul>
							<form method="post" action="{{route('order.create')}}">
								{{ csrf_field() }}
								<?php 
								$userinfo = Auth::user()->userinfo;
								?>
								<strong>Tên người nhận: </strong>
								<input type="text" name="fullname" value="{{$userinfo->fullname}}" required="true"><br><br>
								<strong>Địa chỉ: </strong>
								<input type="text" name="address" value="{{$userinfo->address}}" required="true"><br><br>
								<strong>Số điện thoại: </strong>
								<input type="number" name="phone_number" value="{{$userinfo->phone_number}}" required="true" maxlength="15"><br><br>
								<input type="hidden" name="total_amount" value="{{$total_amount}}" ><br><br>
								<input type="hidden" name="total_price" value="{{$total_price}}" ><br><br>
								@if($userinfo->isLocked == 0)
								<input class="proceedbtn btn-success btn-block btn-lg" 
								type="submit" value="Đặt hàng" name="">
								@else
								<div>
									<h5 style="color: red; ">Không thể thêm vào giỏ do tài khoản bị khóa :(. Hãy liên hệ với admin</h4>
								</div>	
								@endif
							</form>
							<br>
						</div>
						<!-- Shopping Totals -->
					</div>
				</div>
				<!-- Shopping Coupon -->
				</div>
			</div>	
		</div>
		<!-- Shopping Table Container -->
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