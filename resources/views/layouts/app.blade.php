<!DOCTYPE html>
<html lang="en">
<head>
<title> @yield('title') | Big Online Shop</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href= "{{asset('public/frontend/images/fv.jpg')}}" />

<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/bootstrap4/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/plugins/slick-1.8.0/slick.css')}}">
@stack('css')
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/cart_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/responsive.css')}}">

</head>
<body>
<div class="super_container">
	
	<!-- Header -->
	
	<header class="header">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					@php
						$site = DB::table('sitesetting')->first();		
					@endphp
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('public/frontend/images/phone.png')}}" alt=""></div>{{$site->phone_one}}</div>
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('public/frontend/images/mail.png')}}" alt=""></div><a href="mailto:{{$site->email}}">{{$site->email}}</a></div>
						<div class="top_bar_content ml-auto">
							<div class="top_bar_menu">
								<ul class="standard_dropdown top_bar_dropdown">
									<li>
										<a href="#">English<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li><a href="#">Italian</a></li>
											<li><a href="#">Spanish</a></li>
											<li><a href="#">Japanese</a></li>
										</ul>
									</li>
									<li>
										@guest
											<a href="{{ route('login') }}">Sign in or Register</a>
										@else
											@if (Auth::user()->img != NULL)
												<a href="#">{{Auth::user()->name}}<img src="{{asset('public/frontend/images/author/'.Auth::user()->id.'-author'.Auth::user()->img)}}" class="img-fluid rounded-circle ml-2" alt="image" style="width: 30px; height:30px"></a>
											@else
												<a href="#">{{Auth::user()->name}}{{Auth::user()->img}}<img src="{{asset('public/frontend/images/author/default.jpg')}}" class="img-fluid rounded-circle ml-2" alt="image" style="width: 30px; height:30px"></a>
											@endif
											<ul>
												<li><a href="{{route('author.dashboard')}}">Dashboard</a></li>
												<li><a href="{{route('check_out')}}">Checkout</a></li>
												<li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log Out</a></li>
											</ul>
											<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
											</form>
										@endguest
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>

		<!-- Header Main -->

		<div class="header_main" id="st_navbar">
			<div class="container">
				<div class="row">

					<!-- Logo -->
					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<div class="logo"><a href="{{url('')}}">{{$site->company_name}}</a></div>
						</div>
					</div>

					<!-- Search -->
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
									<form action="{{url('product/search')}}" method="get" class="header_search_form clearfix">
										@csrf
										<input type="text" name="search" required="required" class="header_search_input" placeholder="Search for products By...">
										<div class="custom_dropdown">
											<div class="custom_dropdown_list">
												<span class="custom_dropdown_placeholder clc">All Categories</span>
												<i class="fas fa-chevron-down"></i>
												<ul class="custom_list clc">
													<li><a class="clc" href="#">All Categories</a></li>
													@php
														$category = DB::table('categories')->orderBy('category_name','ASC')->get()			
													@endphp
													@isset($category)
														@foreach ($category as $cat)
															<li class="">
																<a href="#">{{ $cat->category_name }}</a>
															</li>
														@endforeach
													@endisset
												</ul>
											</div>
										</div>
										<button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{asset('public/frontend/images/search.png')}}" alt=""></button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Wishlist -->
					<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
						<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
							<div class="wishlist d-flex flex-row align-items-center justify-content-end">
								<div class="wishlist_icon"><img src="{{asset('public/frontend/images/heart.png')}}" alt=""></div>
								<div class="wishlist_content">
									<div class="wishlist_text"><a href="{{Route('wishlist')}}">Wishlist</a></div>
									@php
										$wishlistCount = DB::table('wishlists')->where('user_id',Auth::id())->count();		
									@endphp
									@if (Auth::id())
										<div class="wishlist_count">{{$wishlistCount}}</div>
									@else
									<div class="wishlist_count"></div>
									@endif
								</div>
							</div>

							<!-- Cart -->
							<div class="cart">
								<div class="cart_container d-flex flex-row align-items-center justify-content-end">
									<div class="cart_icon">
										<img src="{{asset('public/frontend/images/cart.png')}}" alt="">
										<div class="cart_count"><span>{{Cart::count()}}</span></div>
									</div>
									<div class="cart_content">
										<div class="cart_text"><a href="#">Cart</a></div>
										<div>$ <span class="cart_price">{{Cart::subtotal()}}</span></div>
									</div>
									<div class="tt-dropdown-inner">
										<div class="tt-cart-layout">
											<div class="tt-cart-content">
												<div class="tt-cart-list">
													@foreach (Cart::content() as $data)
														<div class="tt-item aa">
															<a href="product.html">
																<div class="tt-item-img">
																	<img src="{{asset("public/frontend/images/product/{$data->id}-product-img-main{$data->options['image']}")}}" class="loaded" data-was-processed="true">
																</div>
																<div class="tt-item-descriptions">
																	<h2 class="tt-title">{{$data->name}}</h2>
																	<ul class="tt-add-info">
																		{{-- <li>Vendor: Addidas</li> --}}
																	</ul>
																	<div class="tt-quantity">{{$data->qty}} X</div>
																	<div class="tt-price">${{$data->price}}</div>
																</div>
															</a>
															{{-- remove cart --}}
															<div class="tt-item-close" data-id="{{$data->rowId}}">
																<a href="#"><i class="fas fa-trash"></i></a>
															</div>
														</div>
													@endforeach
												</div>
												<div class="tt-cart-total-row">
													<div class="tt-cart-total-title">SUBTOTAL:</div>
													<div class="tt-cart-total-price cart_price">${{Cart::subtotal()}}</div>
												</div>												
												<div class="tt-cart-btn">
													<div class="tt-item">
														<a href="{{Route('check_out')}}" class="btn btn-success">PROCEED TO CHECKOUT</a>
													</div>
													<div class="tt-item">
														<a href="{{url('cart')}}" class="btn btn-border tt-hidden-desctope">VIEW CART</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		@include('layouts.menubar')
		<div class="arAlert"></div>
	</header>
	
	@yield('content')


	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
						<div class="newsletter_title_container">
							<div class="newsletter_icon"><img src="{{asset('public/frontend/images/send.png')}}" alt=""></div>
							<div class="newsletter_title">Sign up for Newsletter</div>
							<div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
						</div>
						<div class="newsletter_content clearfix">
							<form action="subscriber" method="POST" class="newsletter_form">
								@csrf
								<input type="text" class="newsletter_input @error ('email') is-invalid @enderror" value="{{ old ('email') }}" id="recipient-name" name="email">
									@error('email')
									  <span class="invalid-feedback" role="alert">
										  <strong>{{ $message }}</strong>
									  </span>
									  @enderror
								<button class="newsletter_button" type="submit">Subscribe</button>
							</form>
							{{-- <div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div> --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 footer_col">
					<div class="footer_column footer_contact">
						<div class="logo_container">
							<div class="logo"><a href="#">{{$site->company_name}}</a></div>
						</div>
						<div class="footer_title">Got Question? Call Us 24/7</div>
						<div class="footer_phone">{{$site->phone_two}}</div>
						<div class="footer_contact_text">
							<p>{{$site->company_address}}</p>
						</div>
						<div class="footer_social">
							<ul>
								<li><a href="{{$site->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="{{$site->twitter}}"><i class="fab fa-twitter"></i></a></li>
								<li><a href="{{$site->youtube}}"><i class="fab fa-youtube"></i></a></li>
								<li><a href="{{$site->instragram}}"><i class="fab fa-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-2 offset-lg-2">
					<div class="footer_column">
						<div class="footer_title">Find it Fast</div>
						<ul class="footer_list">
							<li><a href="#">Computers & Laptops</a></li>
							<li><a href="#">Cameras & Photos</a></li>
							<li><a href="#">Hardware</a></li>
							<li><a href="#">Smartphones & Tablets</a></li>
							<li><a href="#">TV & Audio</a></li>
						</ul>
						<div class="footer_subtitle">Gadgets</div>
						<ul class="footer_list">
							<li><a href="#">Car Electronics</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<ul class="footer_list footer_list_2">
							<li><a href="#">Video Games & Consoles</a></li>
							<li><a href="#">Accessories</a></li>
							<li><a href="#">Cameras & Photos</a></li>
							<li><a href="#">Hardware</a></li>
							<li><a href="#">Computers & Laptops</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<div class="footer_title">Customer Care</div>
						<ul class="footer_list">
							<li><a href="#">My Account</a></li>
							<li><a href="#">Order Tracking</a></li>
							<li><a href="#">Wish List</a></li>
							<li><a href="#">Customer Services</a></li>
							<li><a href="#">Returns / Exchange</a></li>
							<li><a href="#">FAQs</a></li>
							<li><a href="#">Product Support</a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</footer>

	<!-- Copyright -->

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
						<div class="copyright_content">
							Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://coderasad.com" target="_blank">Coderas@d</a>
						</div>
						<div class="logos ml-sm-auto">
							<ul class="logos_list">
								<li><a href="#"><img src="{{asset('public/frontend/images/logos_1.png')}}" alt=""></a></li>
								<li><a href="#"><img src="{{asset('public/frontend/images/logos_2.png')}}" alt=""></a></li>
								<li><a href="#"><img src="{{asset('public/frontend/images/logos_3.png')}}" alt=""></a></li>
								<li><a href="#"><img src="{{asset('public/frontend/images/logos_4.png')}}" alt=""></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="scrollup_area">
	<div class="ar_scrollup">
		<i class="fa fa-arrow-up"></i>
	</div>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script src="{{asset('public/frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('public/frontend/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('public/frontend/styles/bootstrap4/bootstrap.min.js')}}"></script>
@stack('js')
<script src="{{asset('public/frontend/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('public/frontend/plugins/slick-1.8.0/slick.js')}}"></script>
<script src="{{asset('public/frontend/js/cart_custom.js')}}"></script>
<script src="{{asset('public/frontend/plugins/easing/easing.js')}}"></script>

<script>
	
	//start scrollup
	$(window).scroll(function() {
        if ($(this).scrollTop() > 500) {
            $('.ar_scrollup').fadeIn();
        } else {
            $('.ar_scrollup').fadeOut();
        }
    });

    //top

    $('.ar_scrollup').click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false
    });


	//end scrollup

	// sticky nav 
	window.onscroll = function() {myFunction()};
	
	var navbar = document.getElementById("st_navbar");
	var sticky = navbar.offsetTop;
	
	function myFunction() {
	  if (window.pageYOffset >= sticky) {
		navbar.classList.add("sticky")
	  } else {
		navbar.classList.remove("sticky");
	  }
	}
	$(document).ready(function () {
		
		 // ajax Setup here=========
		 $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': '{{csrf_token()}}'
			}
		});
		
		// Image show instant start============  
		function readURLa(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#img_show').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		$("#imgInp").change(function () {
			readURLa(this);
		});
		
		// addToCart ajax 
		$("body").on('click', ".cart_ajax", function(){
			var pid = $(this).data('id');
			var qty = $('#quantity_input').val();
			if(qty){
				qty = qty
			}else{
				qty = 1
			}
			var price = parseInt($('.cart_price').text());
			if(pid){
				$.ajax({
					type : "post",
					url : "{{URL::to('add_cart')}}/"+pid,
					data: {
						qty: qty
					},
					success : function(data){
						$(".cart_count").text(data.count);
						$(".cart_price").text(data.total);
						$(".arAlert").html(data.msg);
						$('.tt-cart-list').load(location.href + ' .tt-cart-list');
					}
				})
			}
		})
		// addToCart Remove ajax 
		$("body").on('click', ".tt-item-close", function(){
			var pid = $(this).data('id');
			if(pid){
				$.ajax({
					type : "post",
					url : "{{URL::to('cart_remove')}}/"+pid,
					success : function(data){
						$('.cart').load(location.href + ' .cart');						
						$('.cart_table').load(location.href + ' .cart_table');						
						$(".arAlert").html(data);
					}
				})
			}
		})		
		// wishlist add ajax 
		$("body").on('click', ".addWishList", function(){
			var id = $(this).data('id');
			var number = parseInt($('.wishlist_count').text());
			if(id){
				$.ajax({
					type : "post",
					url : "{{URL::to('wishlist')}}/"+id,
					success : function(data){
						$(".arAlert").html(data);
					}
				})
			}
			if(number >= 0){
				$(this).toggleClass('active');
				if($(this).hasClass('active')){
					$('.wishlist_count').text(number+1);
				}else{
					$('.wishlist_count').text(number-1);
				}
			}
		})
		
	})
</script>
<script>
	$(document).ready(function(){
	  $('[data-toggle="tooltip"]').tooltip();   
	});
</script>

<script src="{{asset('public/frontend/js/custom.js')}}"></script>
<!-- sweet-alert -->
@include('sweetalert::alert')
</body>

</html>