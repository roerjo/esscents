<?php

namespace App\Http\Controllers;

use Log;
use DB;
use Cart;
use Mail;
use Config;
use App\Product;
use Illuminate\Http\Request;
use Config\Services;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index() {

    	$cart = Cart::content();
        $total = Cart::total();
    
    	return view('cart',['cart' => $cart, 'total' => $total]);
    }

    public function addToCart($id) {
    
		$product = Product::find($id);
		
		Cart::add(array(
            'id' => $product->id,
            'type' => $product->type,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->price,
            'options' =>['picture' => $product->picture_url]));

		return back();
    }

    public function updateQuantity(Request $request, $id) {
	
		$product = Product::find($id);

		$rowId = Cart::search(array('id' => $product->id));

        $item = Cart::get($rowId[0]);

        Cart::update($rowId[0], $item->qty = $request->quantity);
    	
    	return redirect('cart');    	
    }

    public function destroy($id) {

    	$product = Product::find($id);

		$rowId = Cart::search(array('id' => $product->id));

		Cart::remove($rowId[0]);

		return redirect('cart');
    }	

    public function charge(Request $request) {
        
        Log::info($request);

        $cart = Cart::content();
        $total = Cart::total();
        Log::info($cart);



        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey(Config::get('services.stripe.secret'));


        // Create the charge on Stripe's servers - this will charge the user's card
        try {
          $charge = \Stripe\Charge::create(array(
            "amount" => Cart::total() * 100, // amount in cents, again
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Example charge"
            ));

        Mail::send('emails.send', [ 
                                    'billingName' => $request->stripeBillingName,
                                    'billingAddress' => $request->stripeBillingAddressLine1,
                                    'billingCity' => $request->stripeBillingAddressCity,
                                    'billingZip' => $request->stripeBillingAddressZip,
                                    'shippingName' => $request->stripeShippingName,
                                    'shippingAddress' => $request->stripeShippingAddressLine1,
                                    'shippingCity' => $request->stripeShipppingAddressCity,
                                    'shippingState' => $request->stripeShippingAddressState,
                                    'shippingZip' => $request->stripeShippingAddressZip,
                                    'cartItems' => $cart,
                                    'cartTotal' => $total

                                    ], function ($message)
        {
            
            $message->from('order@esscentsnaturals.com', 'Essennts Naturals');

            $message->to('roerjo.personal@gmail.com');
        
        });


          return redirect('success');

        
        } catch(\Stripe\Error\Card $e) {
          // The card has been declined
            Log::info($e);
        }
    }
}
