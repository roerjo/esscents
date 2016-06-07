<?php

namespace App\Http\Controllers;

use Log;
use DB;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index()
    {
    	$tinCandles = DB::table('products')->where('type', '=', 'tin')->get();
    	$glassCandles = DB::table('products')->where('type', '=', 'glass')->get();
    	$reedDiffusers = DB::table('products')->where('type', '=', 'reed')->get();
    	
    	$products = array('tinCandles' => $tinCandles, 'glassCandles' => $glassCandles, 'reedDiffusers' => $reedDiffusers);

    	return view('products',['products' => $products]);    	
    }
}
