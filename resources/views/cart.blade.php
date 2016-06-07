@extends('layouts.master')

@section('content')

<!--Shopping Cart Area-->
<h3>Shopping Cart</h3>
<div class="table-responsive cart_info">
    @if(count($cart))
    <table class="table table-condensed">
        <thead>
            <tr class="cart_menu">
                <td class="image">Item</td>
                <td class="description"></td>
                <td class="price">Price</td>
                <td class="quantity">Quantity</td>
                <td class="total">Total</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @foreach($cart as $item)
            <tr>
                <td class="cart_product">
                    <img src="{{$item->options->picture}}" alt="">
                </td>
                <td class="cart_description">
                    <h4>{{$item->name}}</h4>
                </td>
                <td class="cart_price">
                    <p>${{$item->price}}</p>
                </td>
                <td class="cart_quantity">
                    <div class="cart_quantity_button">
						<form method="post" id="{{$item->id}}" action="cart/{{$item->id}}">
							{{ method_field('PUT') }}
							{{ csrf_field() }}
                        	<input class="cart_quantity_input" type="text" name="quantity" value="{{$item->qty}}" autocomplete="off" size="2">
                    </div>  	
                        	<button type="submit" name="update_qty">Update Total</button>
                        </form>
                    
                </td>
                <td class="cart_total">
                    <p class="cart_total_price">${{$item->subtotal}}</p>
                </td>
                <td class="cart_delete">
                	<form method="post" id="{{$item->id}}" action="cart/{{$item->id}}">
						{{ method_field('DELETE') }}
						{{ csrf_field() }}
                    	<button class="cart_quantity_delete" type="submit" name="delete"><i class="fa fa-times"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
            @else
        		<p>You have no items in the shopping cart</p>
        @endif
        </tbody>
    </table>
</div>
<section>
    <div class="total_area">
    	<a class="btn btn-default check_out" href="{{url('products')}}">Continue Shopping</a>
        <a class="btn btn-default check_out" href="{{url('checkout')}}">Check Out</a>
    </div>   
</section>

@stop