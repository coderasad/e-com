@extends('layouts.app')
@section('title')
	Product Details
@endsection
@push('css')		
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/product_styles.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/product_responsive.css')}}">
@endpush
@section('content')
	<!-- Single Product -->

	<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						<li data-image={{asset("public/frontend/images/product/{$product->id}-product-img-main{$product->image_one}")}}>
							<img src={{asset("public/frontend/images/product/{$product->id}-product-img-main{$product->image_one}")}} alt="">
						</li>
						<li data-image={{asset("public/frontend/images/product/{$product->id}-product-img-two{$product->image_two}")}}>
							<img src = {{asset("public/frontend/images/product/{$product->id}-product-img-two{$product->image_two}")}} alt="">
						</li>
						<li data-image={{asset("public/frontend/images/product/{$product->id}-product-img-three{$product->image_three}")}}>
							<img src={{asset("public/frontend/images/product/{$product->id}-product-img-three{$product->image_three}")}} alt="">
						</li>
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src={{asset("public/frontend/images/product/{$product->id}-product-img-main{$product->image_one}")}} alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category"><a href="">{{ $product->category->category_name }}</a> > {{ $product->subcategory->subcategory_name }}</div>
						<div class="product_name">{{ $product->product_name }}</div>
						<div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
						<div class="product_text"><p>{!! Str::limit($product->product_details, 300, '...') !!}</p></div>
						<div class="order_info d-flex flex-row">
							<form action="#">
								<div class="clearfix" style="z-index: 1000;">

									<!-- Product Quantity -->
									<div class="product_quantity clearfix">
										<span>Quantity: </span>
										<input id="quantity_input" type="text" pattern="[0-9]*" value="1">
										<div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div>

									@if ($product->product_color != NULL)
										<!-- Product Color -->
										<ul class="product_color">
											<li>
												<span>Color: </span>
												<div class="color_mark_container"><div id="selected_color" class="color_mark"></div></div>
												<div class="color_dropdown_button"><i class="fas fa-chevron-down"></i></div>

												<ul class="color_list">
													@foreach ($product_color as $data)
													<li><div class="color_mark" data = {{$data}} style="background:{{$data}}"></div></li>
													@endforeach
												</ul>
											</li>
										</ul>
									@endif
									<!-- Product Color -->
									@if ($product->product_size != NULL)
										<ul class="product_size">
											<li>
												<span>Size: </span>
												<div class="size_mark_container"><div id="selected_size" class="size_mark"></div></div>
												<div class="size_dropdown_button"><i class="fas fa-chevron-down"></i></div>

												<ul class="size_list">
													@foreach ($product_size as $data)
														<li><div class="size_mark">{{$data}}</div></li>
													@endforeach
												</ul>
											</li>
										</ul>
									@endif

								</div>

								<div class="product_price">
									@if ($product->discount_price)	
										<div class="ar product_price bestsellers_price discount">Price : ${{$product->discount_price}}<span>Price : ${{$product->selling_price}}</span></div>
									@else										
										<div class="ar product_price">Price : ${{$product->selling_price}}</div>
									@endif
								</div>
								<div class="button_container">
									<button type="button" class="button cart_button cart_ajax" data-id="{{$product->id}}">Add to Cart</button>
									<div class="product_fav"><i class="fas fa-heart"></i></div>
								</div>
								
							</form>
						</div>
					</div>
				</div>
			</div>			
			<div class="row">
				<div class="container mt-5">
					<h2>Product Details</h2>
					<br>
					<!-- Nav tabs -->
					<ul class="nav nav-tabs">
					  <li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#details">Product Details</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#video">Video Link</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#review">Product Review</a>
					  </li>
					</ul>
				  
					<!-- Tab panes -->
					<div class="tab-content">
					  <div id="details" class="container tab-pane active"><br>
						<h3>Product Details</h3>
						<p>{!! $product->product_details !!}</p>
					  </div>
					  <div id="video" class="container tab-pane fade"><br>
						<h3>Video Link</h3>
						<p>{{$product->video_link}}</p>
					  </div>
					  <div id="review" class="container tab-pane fade"><br>
						<h3>Product Review</h3>
						<div class="fb-comments" data-href="{{Request::url()}}" data-numposts="5" data-width=""></div>
					  </div>
					</div>
				  </div>
			</div>
		</div>
	</div>

	<!-- Recently Viewed -->

	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title">Related Product</h3>
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
						</div>
					</div>

					<div class="viewed_slider_container">						
						<!-- Recently Viewed Slider -->
						<div class="owl-carousel owl-theme viewed_slider">							
							<!-- Recently Viewed Item -->
							@foreach ($sub_product as $data)
								<div class="owl-item">
									<div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
										<div class="viewed_image"><img src={{asset("public/frontend/images/product/{$data->id}-product-img-main{$data->image_one}")}} alt=""></div>
										<div class="viewed_content text-center">
											@if ($data->discount_price)	
												<div class="product_price bestsellers_price discount">${{$data->discount_price}}<span>${{$data->selling_price}}</span></div>
											@else										
												<div class="product_price">${{$data->selling_price}}</div>
											@endif
											<div class="viewed_name"><a href="{{URL::to('ProductView/'.$data->product_slug)}}">{{ $data->product_name }}</a></div>
										</div>
										<ul class="item_marks">
											@if ($data->discount_price)
												<li class="product_mark product_discount">
													{{ intval($data->discount_price * 100 / $data->selling_price - 100)}}%
												</li>
											@else
												<li class="product_mark product_new">new</li>
											@endif
										</ul>	
									</div>
								</div>
							@endforeach							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Brands -->

	<div class="brands">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="brands_slider_container">
						
						<!-- Brands Slider -->

						<div class="owl-carousel owl-theme brands_slider">
							@foreach ($brand as $data)
								<div class="owl-item">
									<div class="brands_item d-flex flex-column justify-content-center">
										<img src={{asset("public/frontend/images/brand/brand_logo-{$data->id}{$data->brand_logo}")}} alt="">
									</div>
								</div>
							@endforeach
						</div>
						
						<!-- Brands Slider Navigation -->
						<div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
						<div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

					</div>
				</div>
			</div>
		</div>
	</div>
	
@endsection
@push('js')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v9.0" nonce="lzFAXr2v"></script>

<script>
	$(document).ready(function () {
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
		// $('.alert').first().hide().slideInDown(500).delay(4000).slideInUp(500, function(){
		// 	$(this).remove();
		
	})
</script>
<script src="{{asset('public/frontend/js/product_custom.js')}}"></script>
@endpush