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
						<div class="cart_title text-center">Shopping Cart</div>
						<div class="cart_items">
							<table class="cart_table table table-striped table-inverse">
								<thead class="thead-inverse">
									<tr>
										<th>Image</th>
										<th>Name</th>
										<th>Color</th>
										<th style="width: 10px" >Quantity</th>
										<th>Price</th>
										<th>Total</th>
										<th width="20">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach (Cart::content() as $data)											
										<tr>
											<td class="align-middle">
												<div class="cart_item_image"><img src="{{asset("public/frontend/images/product/{$data->id}-product-img-main{$data->options['image']}")}}" alt=""></div>
											</td>
											<td class="align-middle"><div class="cart_item_text mt-0">{{$data->name}}</div></td>
											<td class="align-middle">
												<div class="cart_item_text mt-0">
													@if ($data->options->color != NULL)
														<span style="background-color:{{$data->options->color}}"></span>
													@else
														<span style="background-color:black"></span>
													@endif
												</div>
											</td>
											<td class="wid20 align-middle">
												<div class="cart_item_text mt-0"></span>
												<form action="{{url('update_cart')}}" method="post">
													@csrf
													<input type="hidden" name="rowId" value="{{$data->rowId}}">
													<input type="number" class='form-control'name="qty" min="1" value="{{$data->qty}}">
													<button type="submit" class="btn btn-success"><i class="fa fa-check-square"></i></button>
												</form>
												</div>
											</td>
											<td class="align-middle"><div class="cart_item_text mt-0"></span>${{$data->price}}</div></td>
											<td class="align-middle"><div class="cart_item_text mt-0"></span>${{$data->price * $data->qty}}</div></td>
											<td class="align-middle">
												<div class="tt-item-close" data-id="{{$data->rowId}}">
													<a data-toggle="tooltip" title="Update" href="#"><i class="fas fa-trash"></i></a>
												</div>
											</td>
										</tr>
									@endforeach
									<tr>
										<th colspan="5"><div class="order_total_title">Order Total:</div></th>
										<td colspan="2"><div class="order_total_amount">${{cart::total()}}</div></td>
									</tr>
								</tbody>
							</table>
						</div>

						<div class="cart_buttons">
							<button type="button" class="button cart_button_checkout"><a href="{{Route('check_out')}}">Check out</a></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
@endsection