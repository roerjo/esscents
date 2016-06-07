@extends('layouts.master')

@section('content')

<!--Checkout Area-->

<div id="wrap">
	<form action="/checkout" method="POST">
	{{ csrf_field() }}
	<div class="column column1">
		<div class="title">
			<h3>Email Address</h3>
		</div>	
			<div class="form-container">
    			<input type="email" name="email" value="" id="email-address" placeholder="Email Address" data-trigger="change" data-validation-minlength="1" data-type="email" data-required="true" data-error-message="Enter a valid email address."/><label for="email">Email Address</label>
    		</div>
			<div class="title">
				<h3>Shipping Information</h3>
			</div>
			<div class="form-container">
				<input type="name" name="first_name" value="" id="first_name" placeholder="First Name" data-trigger="change" data-validation-minlength="1" data-type="name" data-required="true" data-error-message="Enter Your First Name"/><label for="first_name">First Name</label>
    		</div>
			<div class="form-container">
				<input type="name" name="last_name" value="" id="last_name" placeholder="Last Name" data-trigger="change" data-validation-minlength="1" data-type="name" data-required="true" data-error-message="Enter Your Last Name"/><label for="last_name">Last Name</label>
			</div>
			<div class="form-container">
				<input type="phone" name="telephone" value="" id="telephone" placeholder="Phone(555)-555-5555" data-trigger="change" data-validation-minlength="1" data-type="number" data-required="true" data-error-message="Enter Your Telephone Number"/><label for="telephone">Telephone</label>
			</div>
			<div class="form-container">
				<input type="text" name="address" value="" id="address" placeholder="Address" data-trigger="change" data-validation-minlength="1" data-type="text" data-required="true" data-error-message="Enter Your Shipping Address"/><label for="Address">Address</label>
			</div>
			<div class="form-container">
				<input type="text" name="address2" value="" id="address2" placeholder="Address 2" data-trigger="change" data-validation-minlength="1" data-type="text"/><label for="Address2">Address2</label>
			</div>
			<div class="form-container">
				<input type="text" name="city" value="" id="city" placeholder="City" data-trigger="change" data-validation-minlength="1" data-type="text" data-required="true" data-error-message="Enter Your Shipping City"/><label for="city">City</label>
			</div>

			<div class="form-container">
         		<select id="state">
          	 		<option value="AL">Alabama</option>
					<option value="AK">Alaska</option>
					<option value="AZ">Arizona</option>
					<option value="AR">Arkansas</option>
					<option value="CA">California</option>
					<option value="CO">Colorado</option>
					<option value="CT">Connecticut</option>
					<option value="DE">Delaware</option>
					<option value="DC">District Of Columbia</option>
					<option value="FL">Florida</option>
					<option value="GA">Georgia</option>
					<option value="HI">Hawaii</option>
					<option value="ID">Idaho</option>
					<option value="IL">Illinois</option>
					<option value="IN">Indiana</option>
					<option value="IA">Iowa</option>
					<option value="KS">Kansas</option>
					<option value="KY">Kentucky</option>
					<option value="LA">Louisiana</option>
					<option value="ME">Maine</option>
					<option value="MD">Maryland</option>
					<option value="MA">Massachusetts</option>
					<option value="MI">Michigan</option>
					<option value="MN">Minnesota</option>
					<option value="MS">Mississippi</option>
					<option value="MO">Missouri</option>
					<option value="MT">Montana</option>
					<option value="NE">Nebraska</option>
					<option value="NV">Nevada</option>
					<option value="NH">New Hampshire</option>
					<option value="NJ">New Jersey</option>
					<option value="NM">New Mexico</option>
					<option value="NY">New York</option>
					<option value="NC">North Carolina</option>
					<option value="ND">North Dakota</option>
					<option value="OH">Ohio</option>
					<option value="OK">Oklahoma</option>
					<option value="OR">Oregon</option>
					<option value="PA">Pennsylvania</option>
					<option value="RI">Rhode Island</option>
					<option value="SC">South Carolina</option>
					<option value="SD">South Dakota</option>
					<option value="TN">Tennessee</option>
					<option value="TX">Texas</option>
					<option value="UT">Utah</option>
					<option value="VT">Vermont</option>
					<option value="VA">Virginia</option>
					<option value="WA">Washington</option>
					<option value="WV">West Virginia</option>
					<option value="WI">Wisconsin</option>
					<option value="WY">Wyoming</option>
         		</select>
         	</div>	
			<div class="form-container">
				<input type="text" name="zip" value="" id="zip" placeholder="Zip Code" data-trigger="change" data-validation-minlength="1" data-type="text" data-required="true" data-error-message="Enter Your Billing Zip Code"/><label for="zip">Zip Code</label>
			</div>
			
	</div>	
	<div class="column column3">
		<div class="title">
			<h3>Finalize Order</h3>
		</div>
		<div class="content" id="final_products">
			<div class="products">
				<table class="table table-condensed">
			        <thead>
			            <tr class="cart_menu">
			                <td class="image">Item</td>
			                <td class="description"></td>
			                <td class="quantity">Quantity</td>
			                <td class="total">Subtotal</td>
			            </tr>
			        </thead>
			        <tbody>
			        @foreach($cart as $item)
			        	<tr>
							<td class="cart_product">
			                    <img src="{{$item->options->picture}}"/>
			                </td>
			                <td class="cart_description">
			                    <h4>{{$item->name}}</h4>
			                </td>
			                <td class="cart_quantity">
			                	<p>{{$item->qty}}</p>
			                </td>
			                <td class="cart_total">
	                    		<p class="cart_total_price">${{$item->subtotal}}</p>
	                		</td>
	                	</tr>
	                @endforeach
	                </tbody>
	            </table>
	        </div>
			<div class="final">
				<h3 id="title">Total <span id="calculated_total">${{$total}}</span></h3>
			</div>				
			
				
				<a class="btn btn-default return" href="{{url('products')}}">Back to Products</a>
    			<a class="btn btn-default cart" href="{{url('cart')}}">Back to Cart</a>

    			<script
				    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
				    data-key="pk_test_rIiVcUya55aRozfMYjahuzbU"
				    data-amount="{{$total * 100}}"
				    data-name="Esscents Naturals"
				    data-description="Widget"
				    data-image="/img/documentation/checkout/marketplace.png"
				    data-locale="auto"
				    data-zip-code="true">
				</script>
			
				<span class="sub">By selecting Complete Order you agree to the purchase and subsequent payment for this order.</span>
			
		</div>
	</div>
	</form>
</div>


@stop