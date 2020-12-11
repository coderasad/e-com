@extends('layouts.app')
@section('title')
	Cart Page
@endsection
@section('content')

	<!-- Cart -->
	<div class="cart_section">
		<div class="cart_title text-center">Payment Details</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="cart_container">
						<div class="cart_items">
							<table class="cart_table table table-striped table-inverse border">
								<thead class="thead-inverse">
									<tr>
										<th>Image</th>
										<th>Name</th>
										<th>Color</th>
										<th style="width: 20px" >Quantity</th>
										<th>Price</th>
										<th>Total</th>
										<th width="5">Action</th>
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
										<th colspan="6"><div class="order_total_title">Order Total:</div></th>
										<td colspan=""><div class="order_total_amount">${{cart::Subtotal()}}</div></td>
									</tr>
								</tbody>
							</table>
						</div>
						
					</div>
					<div class="card p-4 shipping_address">
						<h3 class="mb-4 text-center">Billing Address</h3>
						<form action="{{ route('payment_process') }}" method="POST">
							@csrf
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label for="userName">Full Name</label>
										<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="userName" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter Full Name">
										@error('name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="col-6">                                
									<div class="form-group">
										<label for="phone">Enter Phone Number</label>
										<input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus placeholder="01xxxxxxxxx">
										@error('phone')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="log_email">Email</label>
										<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="log_email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email">
										@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="address">Address</label>
										<input type="text" class="form-control  @error('address') is-invalid @enderror" name="address" required  id="address" placeholder="address">
										@error('address')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="city">City</label>
										<input type="text" class="form-control" name="city"	required  id="city" placeholder="City">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="payment">Payment By</label>
										<ul class="logos_list">
											<li><input type="radio" value='stripe' name="payment"><img src="http://localhost/a/eCom/public/frontend/images/logos_2.png" alt=""></li>
											<li><input type="radio" value='cash' name="payment">Cash I	n Hand</li>
										</ul>
									</div>
								</div>
								<div class="col-12">
									<button type="submit" class="btn btn-info btn-block" style="cursor: pointer"><b>Pay Now</b></button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-lg-4">
					<form class='checkout_form p-2 cart_items' action="{{url("coupon_code")}}" method="post">
						@csrf
						<div class="form-group row">
							<label for="coupon" class="col-md-4 col-form-label">Coupon Code</label>
							<div class="col-md-8">
							  <input type="text" min="0" class="form-control" id="coupon" name='coupon' placeholder="Coupon Code">
							</div>
							<div class="col-md-8 mt-2 offset-md-4">
							  <input type="submit" class="btn btn-success w-100" value="Submit">
							</div>
						</div>
					</form>
					@if (Cart::Subtotal() > 0)
						<table class="table border checkout_form mt-2">
							<tr>
								<td>Sub-Total: </td>
								<td class="text-right">{{Cart::Subtotal()}}</td>
							</tr>
							<tr>
								<td>Shipping Cahrge : </td>
								<td class="text-right">$ {{$shipping_cost}}.00</td>
							</tr>
							<tr>
								<th>Total : </th>
								<th class="text-right">
									$ {{ Cart::Subtotal() + $shipping_cost}}.00									
								</th>
							</tr>
						</table>
					@endif
				</div>
			</div>
		</div>
	</div>	
@endsection