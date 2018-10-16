<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
		$products = Product::all()->groupBy('type');

    	return view('products', compact('products'));
    }
}
