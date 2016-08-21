<html>
<head>
	{{ csrf_field() }}
</head>
<body style="background: black; color: white">

	<h1>Invoice</h1>
	<p>
		<h3>Billing Info</h3>
			<p>
				{{$billingName}}
				{{$billingAddress}}
				{{$billingCity}}
				{{$billingZip}}
			</p>
		<h3>Shipping Info</h3>
			<p>
				{{$shippingName}}
				{{$shippingAddress}}
				{{$shippingCity}}
				{{$shippingState}}
				{{$shippingZip}}
			</p>

		<h3>Items</h3>
			@foreach($cartItems as $item)
				<p>
					{{$item->name}}
					{{$item->qty}}
					{{$item->price}}
				</p>
			@endforeach
		<h3>Total Sent to Stripe</h3>
			<p>
				{{$cartTotal}}
			</p>
	</p>


</body>
</html>