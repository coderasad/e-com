@extends('layouts.app')
@section('title')
	Stripe Page
@endsection
@push('css')
	<style>
		.StripeElement {
		box-sizing: border-box;

		height: 40px;
		width:100%;

		padding: 10px 12px;

		border: 1px solid transparent;
		border-radius: 4px;
		background-color: white;

		box-shadow: 0 1px 3px 0 #e6ebf1;
		-webkit-transition: box-shadow 150ms ease;
		transition: box-shadow 150ms ease;
		}

		.StripeElement--focus {
		box-shadow: 0 1px 3px 0 #cfd7df;
		}

		.StripeElement--invalid {
		border-color: #fa755a;
		}

		.StripeElement--webkit-autofill {
		background-color: #fefde5 !important;
		}
	</style>
@endpush
@section('content')

	<!-- Cart -->
	<div class="cart_section">
		<div class="cart_title text-center">Payment Details</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-7">
					<div class="cart_container">
						<div class="cart_items">
							<table class="cart_table table table-striped table-inverse border">
								<thead class="thead-inverse">
									<tr>
										<th>Total Amount</th>
										<td>$ {{$fixedPrice}}.00</td>
									</tr>
									<tr>
										<th>Full Name</th>
										<td>{{$name}}</td>
									</tr>
									<tr>
										<th>Email</th>
										<td>{{$email}}</td>
									</tr>
									<tr>
										<th>Phone</th>
										<td>{{$phone}}</td>
									</tr>
									<tr>
										<th>Address</th>
										<td>{{$address}}</td>
									</tr>
									<tr>
										<th>City</th>
										<td>{{$city}}</td>
									</tr>
								</thead>								
							</table>
						</div>
					</div>
				</div>
				<div class="col-lg-5">					
					<div class="card p-3" style="margin-top: 40px;">
						<form action="{{Route('stripe.charge')}}" method="post" id="payment-form">
							@csrf
							<div class="form-row">
							  <label for="card-element">
								Credit or debit card
							  </label>
							  <div id="card-element">
								<!-- A Stripe Element will be inserted here. -->
							  </div>
						  
							  <!-- Used to display form errors. -->
							  <div id="card-errors" role="alert"></div>
							</div>
							{{-- extra data pass  --}}
							<input type="hidden" name='shipping' value="{{$charge}}">
							<input type="hidden" name='vat' value="0">
							<input type="hidden" name='total' value="{{$fixedPrice}}">
							<input type="hidden" name="ship_name" value="{{$name}}">
							<input type="hidden" name="ship_email" value="{{$email}}">
							<input type="hidden" name="ship_phone" value="{{$phone}}">
							<input type="hidden" name="ship_address" value="{{$address}}">
							<input type="hidden" name="ship_city" value="{{$city}}">
							<input type="hidden" name="payment_type" value="{{$payment}}">
							<button class="btn btn-info mt-2">Submit Payment</button>
						  </form>
					</div>
				</div>
			</div>
		</div>
	</div>	
@endsection
@push('js')
	<script>
		// Create a Stripe client.
		var stripe = Stripe('pk_test_51HpCHCDHXnolxYEmvJQ2G5hNbYZYNUv09FVk3Co3Xpu9GFPSg4GJoa7C22JYeSVwYKzMCaSoHNAT3j0sSbaJPFNe00Ld7DT3eZ');

		// Create an instance of Elements.
		var elements = stripe.elements();

		// Custom styling can be passed to options when creating an Element.
		// (Note that this demo uses a wider set of styles than the guide below.)
		var style = {
		base: {
			color: '#32325d',
			fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
			fontSmoothing: 'antialiased',
			fontSize: '16px',
			'::placeholder': {
			color: '#aab7c4'
			}
		},
		invalid: {
			color: '#fa755a',
			iconColor: '#fa755a'
		}
		};

		// Create an instance of the card Element.
		var card = elements.create('card', {style: style});

		// Add an instance of the card Element into the `card-element` <div>.
		card.mount('#card-element');

		// Handle real-time validation errors from the card Element.
		card.on('change', function(event) {
		var displayError = document.getElementById('card-errors');
		if (event.error) {
			displayError.textContent = event.error.message;
		} else {
			displayError.textContent = '';
		}
		});

		// Handle form submission.
		var form = document.getElementById('payment-form');
		form.addEventListener('submit', function(event) {
		event.preventDefault();

		stripe.createToken(card).then(function(result) {
			if (result.error) {
			// Inform the user if there was an error.
			var errorElement = document.getElementById('card-errors');
			errorElement.textContent = result.error.message;
			} else {
			// Send the token to your server.
			stripeTokenHandler(result.token);
			}
		});
		});

		// Submit the form with the token ID.
		function stripeTokenHandler(token) {
		// Insert the token ID into the form so it gets submitted to the server
		var form = document.getElementById('payment-form');
		var hiddenInput = document.createElement('input');
		hiddenInput.setAttribute('type', 'hidden');
		hiddenInput.setAttribute('name', 'stripeToken');
		hiddenInput.setAttribute('value', token.id);
		form.appendChild(hiddenInput);

		// Submit the form
		form.submit();
		}
	</script>
@endpush