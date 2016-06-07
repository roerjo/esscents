<?php

namespace App\Http\Controllers;

use Log;
use DB;
use Cart;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function index() {

    	$cart = Cart::content();
    	$total = Cart::total();
   
    	return view('checkout',['cart' => $cart, 'total' => $total]);
    }

    public function charge(Request $request) {
    	
    	Log::info($request);

    	// Set your secret key: remember to change this to your live secret key in production
		// See your keys here https://dashboard.stripe.com/account/apikeys
		\Stripe\Stripe::setApiKey("sk_test_kYUb4twDgTnsl02nySdXrKYM");


		// Create the charge on Stripe's servers - this will charge the user's card
		try {
		  $charge = \Stripe\Charge::create(array(
		    "amount" => Cart::total() * 100, // amount in cents, again
		    "currency" => "usd",
		    "source" => $request->stripeToken,
		    "description" => "Example charge"
		    ));

		  return redirect('success');

		
		} catch(\Stripe\Error\Card $e) {
		  // The card has been declined
			Log::info($e);
		}
    }
}
