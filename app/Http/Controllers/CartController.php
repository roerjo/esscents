<?php

namespace App\Http\Controllers;

use Cart;
use Mail;
use App\Product;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Error\Card;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    /**
     * Retrieve cart contents
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
    	$cart = Cart::content();
        $total = Cart::total();

    	return view('cart', compact('cart', 'total'));
    }

    /**
     * Add an item to the cart
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function addToCart(int $id)
    {
        $product = Product::find($id);

		Cart::add(
            $product->id,
            $product->name,
            1,
            $product->price,
            [
                'type'    => $product->type,
                'picture' => $product->picture_url,
            ]
        );

		return back();
    }

    /**
     * Adjust the quantity of an item in the cart
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function updateQuantity(Request $request, int $id)
    {
		$product = Product::find($id);

		$rowId = Cart::search(['id' => $product->id]);

        $item = Cart::get($rowId[0]);

        Cart::update($rowId[0], $item->qty = $request->quantity);

    	return redirect('cart');
    }

    /**
     * Remove an item from the cart
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function destroy(int $id)
    {
    	$product = Product::find($id);

		$rowId = Cart::search(['id' => $product->id]);

		Cart::remove($rowId[0]);

		return redirect('cart');
    }

    /**
     * Charge the customer
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function charge(Request $request)
    {
        $cart = Cart::content();
        $total = Cart::total();

        // Set your secret key: remember to change this to your live secret key
        // in production
        // See your keys here https://dashboard.stripe.com/account/apikeys
        Stripe::setApiKey(config('services.stripe.secret'));

        // Create the charge on Stripe's servers
        try {
            $charge = Charge::create([
                'amount'        => $total * 100, // amount in cents
                'currency'      => 'usd',
                'source'        => $request->stripeToken,
                'description'   => 'Example charge',
            ]);

            Mail::send('emails.invoice', [
                'billingName'       => $request->stripeBillingName,
                'billingAddress'    => $request->stripeBillingAddressLine1,
                'billingCity'       => $request->stripeBillingAddressCity,
                'billingZip'        => $request->stripeBillingAddressZip,
                'shippingName'      => $request->stripeShippingName,
                'shippingAddress'   => $request->stripeShippingAddressLine1,
                'shippingCity'      => $request->stripeShipppingAddressCity,
                'shippingState'     => $request->stripeShippingAddressState,
                'shippingZip'       => $request->stripeShippingAddressZip,
                'cartItems'         => $cart,
                'cartTotal'         => $total
            ], function ($message) {
                $message->from(
                    'order@esscentsnaturals.com', 'Esscents Naturals'
                );
                $message->to('roerjo.personal@gmail.com');
                $message->subject('Order Completed | Esscents Naturals');
            });

            return redirect('success');
        } catch(Card $e) {
            // The card has been declined
            die(var_dump($e));
        }
    }
}
