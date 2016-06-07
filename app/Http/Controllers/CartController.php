<?php

namespace App\Http\Controllers;

use Log;
use DB;
use Cart;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index() {

    	$cart = Cart::content();
    
    	return view('cart',['cart' => $cart]);
    }

    public function addToCart($id) {
    
		$product = Product::find($id);
		
		Cart::add(array('id' => $product->id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price, 'options' =>['picture' => $product->picture_url]));

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

}
