<!-- Main Navigation -->

<nav class="main_nav">
	<div class="container">
		<div class="row">
			<div class="col">
				
				<div class="main_nav_content d-flex flex-row">

					<!-- Categories Menu -->

					<div class="cat_menu_container">
						<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
							<div class="cat_burger"><span></span><span></span><span></span></div>
							<div class="cat_menu_text">categories</div>
						</div>
						<ul class="cat_menu">
							@php
								$category = DB::table('categories')->orderBy('category_name','ASC')->get();		
								$subcategory = DB::table('subcategories')->orderBy('subcategory_name','ASC')->get()			
							@endphp
							@isset($category)
								@foreach ($category as $cat)
									<li class="catList">
										<a href="{{url('shop/'.$cat->category_name.'/'.$cat->id)}}">{{ $cat->category_name }}<i class="fas fa-chevron-right"></i></a>
										<ul class="subUl">
											@foreach ($subcategory as $sub)									
												@if ($sub->category_id == $cat->id)										
													<li class="subList">
														<a href="{{url('subcat/'.$sub->subcategory_name.'/'.$sub->id)}}">{{ $sub->subcategory_name}}</a>
													</li>										
												@endif
											@endforeach	
										</ul>							
									</li>
								@endforeach
							@endisset
						</ul>				
					</div>
					<!-- Main Nav Menu -->

					<div class="main_nav_menu ml-auto">
						<ul class="standard_dropdown main_nav_dropdown">
							<li><a href="{{url('')}}">Home<i class="fas fa-chevron-down"></i></a></li>
							<li><a href="{{url('shop')}}">Shop<i class="fas fa-chevron-down"></i></a></li>
							<li><a href="#">Blog<i class="fas fa-chevron-down"></i></a></li>
							<li><a href="#">Contact<i class="fas fa-chevron-down"></i></a></li>
							
						</ul>
					</div>

					<!-- Menu Trigger -->

					<div class="menu_trigger_container ml-auto">
						<div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
							<div class="menu_burger">
								<div class="menu_trigger_text">menu</div>
								<div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</nav>

<!-- Menu -->

<div class="page_menu">
	<div class="container">
		<div class="row">
			<div class="col">
				
				<div class="page_menu_content">
					
					<div class="page_menu_search">
						<form action="#">
							<input type="search" required="required" class="page_menu_search_input" placeholder="Search for products...">
						</form>
					</div>
					<ul class="page_menu_nav">
						<li class="page_menu_item has-children">
							<a href="#">Language<i class="fa fa-angle-down"></i></a>
							<ul class="page_menu_selection">
								<li><a href="#">English<i class="fa fa-angle-down"></i></a></li>
								<li><a href="#">Italian<i class="fa fa-angle-down"></i></a></li>
								<li><a href="#">Spanish<i class="fa fa-angle-down"></i></a></li>
								<li><a href="#">Japanese<i class="fa fa-angle-down"></i></a></li>
							</ul>
						</li>
						<li class="page_menu_item has-children">
							<a href="#">Currency<i class="fa fa-angle-down"></i></a>
							<ul class="page_menu_selection">
								<li><a href="#">US Dollar<i class="fa fa-angle-down"></i></a></li>
								<li><a href="#">EUR Euro<i class="fa fa-angle-down"></i></a></li>
								<li><a href="#">GBP British Pound<i class="fa fa-angle-down"></i></a></li>
								<li><a href="#">JPY Japanese Yen<i class="fa fa-angle-down"></i></a></li>
							</ul>
						</li>
						<li class="page_menu_item">
							<a href="#">Home<i class="fa fa-angle-down"></i></a>
						</li>
						<li class="page_menu_item has-children">
							<a href="#">Super Deals<i class="fa fa-angle-down"></i></a>
							<ul class="page_menu_selection">
								<li><a href="#">Super Deals<i class="fa fa-angle-down"></i></a></li>
								<li class="page_menu_item has-children">
									<a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li>
								<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
								<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
								<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
							</ul>
						</li>
						<li class="page_menu_item has-children">
							<a href="#">Featured Brands<i class="fa fa-angle-down"></i></a>
							<ul class="page_menu_selection">
								<li><a href="#">Featured Brands<i class="fa fa-angle-down"></i></a></li>
								<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
								<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
								<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
							</ul>
						</li>
						<li class="page_menu_item has-children">
							<a href="#">Trending Styles<i class="fa fa-angle-down"></i></a>
							<ul class="page_menu_selection">
								<li><a href="#">Trending Styles<i class="fa fa-angle-down"></i></a></li>
								<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
								<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
								<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
							</ul>
						</li>
						<li class="page_menu_item"><a href="blog.html">blog<i class="fa fa-angle-down"></i></a></li>
						<li class="page_menu_item"><a href="contact.html">contact<i class="fa fa-angle-down"></i></a></li>
					</ul>
					
					<div class="menu_contact">
						<div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{asset('public/frontend/images/phone_white.png')}}" alt=""></div>+38 068 005 3570</div>
						<div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{asset('public/frontend/images/mail_white.png')}}" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
