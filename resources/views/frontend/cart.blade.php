@extends('frontend.layouts.master')

@section('title')
    Cart
@endsection

@section('link-css')
	<link rel="stylesheet" type="text/css" href="/frontend/styles/bootstrap4/bootstrap.min.css">
	<link href="/frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="/frontend/styles/cart_styles.css">
	<link rel="stylesheet" type="text/css" href="/frontend/styles/cart_responsive.css">
@endsection

@section('content')
	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title">Shopping Cart</div>
						<div class="cart_items">
							<ul class="cart_list">
                                @foreach($all as $product)

								<li class="cart_item clearfix">
									<div class="cart_item_image">
                                                <img style="max-width: 75%" src="/{{$product->options->image}}" alt="">
                                    </div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Name</div>
											<div class="cart_item_text"><a href="/online/shop/product/{{$product->id}}">{{$product->name}}</a></div>
										</div>
										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">Quantity</div>
											<div class="cart_item_text">{{$product->qty}}</div>
										</div>
										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title">Price</div>
											<div class="cart_item_text">{{number_format($product->price)}} VND</div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Total</div>
											<div class="cart_item_text">{{number_format($product->qty*$product->price)}} VND</div>
										</div>
{{--                                        <a class="btn btn-danger" href="/online/cart/delete/{{ $product->id }}">DEL</a>--}}
									</div>
								</li>
{{--                                    {{$total+=$product->qty*$product->price}}--}}
                                    @endforeach
							</ul>
						</div>

						<!-- Order Total -->
						<div class="order_total">
							<div class="order_total_content text-md-right">
								<div class="order_total_title">Order Total:</div>
								<div class="order_total_amount">{{\Gloudemans\Shoppingcart\Facades\Cart::total()}}</div>
							</div>
						</div>

						<div class="cart_buttons">
							<button type="button" class="button cart_button_clear">Add to Cart</button>
							<button type="button" class="button cart_button_checkout">Add to Cart</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('link-js')
	<script src="/frontend/js/jquery-3.3.1.min.js"></script>
	<script src="/frontend/styles/bootstrap4/popper.js"></script>
	<script src="/frontend/styles/bootstrap4/bootstrap.min.js"></script>
	<script src="/frontend/plugins/greensock/TweenMax.min.js"></script>
	<script src="/frontend/plugins/greensock/TimelineMax.min.js"></script>
	<script src="/frontend/plugins/scrollmagic/ScrollMagic.min.js"></script>
	<script src="/frontend/plugins/greensock/animation.gsap.min.js"></script>
	<script src="/frontend/plugins/greensock/ScrollToPlugin.min.js"></script>
	<script src="/frontend/plugins/easing/easing.js"></script>
	<script src="/frontend/js/cart_custom.js"></script>
@endsection
