@extends('layouts.app')
@section('title')
	Shop Page
@endsection
@push('css')		
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/shop_styles.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/shop_responsive.css')}}">
@endpush
@section('content')
	<!-- Shop -->
	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Categories</div>
							<ul class="sidebar_categories">
								@foreach ($category as $cat)
									<li>
										<a href="{{url('shop/'.$cat->category_name.'/'.$cat->id)}}">{{$cat->category_name}}</a>
									</li>
								@endforeach
							</ul>
						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle brands_subtitle">Brands</div>
							<ul class="brands_list">
								@foreach ($brand as $data)
								<li class="brand">
									<a href="{{url('brand/'.$data->brand_name.'/'.$data->id)}}">{{$data->brand_name}}</a>
								</li>
								@endforeach
							</ul>
						</div>
					</div>

				</div>

				<div class="col-lg-9">
					
					<!-- Shop Content -->

					<div class="shop_content">
						<div class="shop_bar clearfix">
							<div class="shop_product_count"><span>{{$product->count()}}</span> products found</div>
							<div class="shop_sorting">
								<span>Sort by:</span>
								<ul>
									<li>
										<span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
										<ul>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
											<li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>

						<div class="product_grid">
							<div class="product_grid_border"></div>

							<div class="row">
								@foreach ($product as $data)
									<div class="col-md-3">
										<!-- Product Item -->
										<div class="product_item is_new">
											<div class="product_border"></div>
											<div class="product_image d-flex flex-column align-items-center justify-content-center">
												<img src="{{asset("public/frontend/images/product/{$data->id}-product-img-main{$data->image_one}")}}" alt="">
											</div>
											<div class="product_content">
												<div class="product_price">{{ $data->selling_price }}</div>
												<div class="product_name"><div><a href="{{URL::to('ProductView/'.$data->product_slug)}}" tabindex="0">{{ Str::limit($data->product_name, 15) }}</a></div></div>
											</div>
											@php
												$wishlist = DB::table('wishlists')->where('user_id',Auth::id())->where('product_id',$data->id)->count();
											@endphp
											@if ($wishlist)
												<div class="addWishList pointer product_fav active" data-id="{{$data->id}}">
													<i class="fas fa-heart"></i>
												</div>
											@else												
												<div class="addWishList pointer product_fav" data-id="{{$data->id}}">
													<i class="fas fa-heart"></i>
												</div>
											@endif
											<ul class="product_marks">
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

						<!-- Shop Page Navigation -->
						<div class="shop_page_nav d-flex flex-row">
							<ul class="page_nav d-flex flex-row">
								{{ $product->links() }}	
							</ul>
							
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>

@endsection
@push('js')
	<script src="{{asset('public/frontend/js/shop_custom.js')}}"></script>
@endpush