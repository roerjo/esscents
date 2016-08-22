<html>
<head>
	{{ csrf_field() }}

	<style>

		body (
				background: white;
				color: black;
			)

		ul (
				list-style: none;
			)

	</style>
</head>
<body>

	<h1>Invoice</h1>
	<p>
		<h3>Billing Info</h3>
			<p>
				<ul>
					<li>{{$billingName}}</li>
					<li>{{$billingAddress}}</li>
					<li>{{$billingCity}}</li>
					<li>{{$billingZip}}</li>
				</ul>
			</p>
		<h3>Shipping Info</h3>
			<p>
				<ul>
					<li>{{$shippingName}}</li>
					<li>{{$shippingAddress}}</li>
					<li>{{$shippingCity}}</li>
					<li>{{$shippingState}}</li>
					<li>{{$shippingZip}}</li>
				</ul>
			</p>

		<h3>Items</h3>
			@foreach($cartItems as $item)
			<p>
				<ul>
					<li>Type: {{$item->type}}</li>
					<li>{{$item->name}}</li>
					<li><strong>{{$item->qty}}</strong></li>
					<li>${{$item->price}}</li>
				</ul>
			</p>
			@endforeach
		<h3>Total Sent to Stripe</h3>
			<p>
				${{$cartTotal}}
			</p>
	</p>


</body>
</html>