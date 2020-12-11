@extends('layouts.app')
@section('title')
	Cart Page
@endsection
@section('content')

	<!-- Cart -->
	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title text-center">Your Wishlist</div>
						<div class="cart_items">
							<table class="wishlist_table table table-striped table-inverse text-center">
								<thead class="thead-inverse">
									<tr>
										<th>Image</th>
										<th>Name</th>
										<th>Add</th>
										<th width="20">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($wishlist as $data)											
										<tr>
											<td class="align-middle">
												<div class="cart_item_image"><img src="{{asset("public/frontend/images/product/{$data->id}-product-img-main{$data->image_one}")}}" alt=""></div>
											</td>
											<td class="align-middle"><div class="cart_item_text mt-0">{{$data->product_name}}</div></td>
											<td class="align-middle"><button class="btn btn-danger remove_wishlist cart_ajax" data-id="{{$data->id}}">Add to Cart</button></td>
											<td class="align-middle">
												<div class="remove_wishlist" data-id="{{$data->id}}">
													<i class="fas fa-trash"></i>
												</div>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
@endsection
@push('js')
	<script>
		// Wishlist Remove ajax 
		$("body").on('click', ".remove_wishlist", function(){
			var pid = $(this).data('id');
			if(pid){
				$.ajax({
					type : "post",
					url : "{{URL::to('wishlist_remove')}}/"+pid,
					success : function(data){
						$('.wishlist_table').load(location.href + ' .wishlist_table');						
						$('.wishlist_content').load(location.href + ' .wishlist_content');						
						$(".arAlert").html(data);
					}
				})
			}
		})
	</script>
@endpush