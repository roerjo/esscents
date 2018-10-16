<?php

namespace App\Http\Controllers;

use Log;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('admin.products',['products' => $products]);
    }
 
    public function destroy($id){
        $product = Product::find($id);
        if(unlink($product->picture_url)) {
            echo 'Picture deleted';
        } else {
            echo 'No picture found';
        }
        $product->destroy($id);

        return redirect('/admin/products');
    }
 
    public function newProduct(){
        return view('admin.new');
    }
 
    public function add(Request $request) {
 
        $product = new Product();
        $product->type = $request->get('type');
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        
        $product->picture_url = "images/" . implode(" ", $request->only('type')) . "/" . implode(" ", $request->only('name')) . ".jpg";
        $request->file('picture_url')->move( base_path()."/public/images/" . implode(" ", $request->only('type')), implode(" ", $request->only('name')) . ".jpg");
 
        $product->save();
 
        return redirect('/admin/products');
 
    }

    public function edit($id) {
    	$product = Product::find($id);
   
    	return view('admin.update', ['product' => $product]);
    }

    public function update(Request $request, $id) {
    	
    	
    	$product = Product::find($id);
    
    	if($request->picture_url) {
    		if(file_exists($product->picture_url)) {
                unlink($product->picture_url);
            }
    		$product->picture_url = "images/" . implode(" ", $request->only('type')) . "/" . implode(" ", $request->only('name')) . ".jpg";
        	$request->file('picture_url')->move( base_path()."/public/images/" . implode(" ", $request->only('type')), implode(" ", $request->only('name')) . ".jpg");
    	}

    	if(!$request->picture_url) {
            if($request->name != $product->name || $request->type != $product->type) {
        		copy($product->picture_url, "images/" . implode(" ", $request->only('type')) . "/" . implode(" ", $request->only('name')) . ".jpg");
        		unlink($product->picture_url);
        		$product->picture_url = "images/" . implode(" ", $request->only('type')) . "/" . implode(" ", $request->only('name')) . ".jpg";
            }
    	}

    	$product->type = $request->get('type');
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');

        $product->save();

    	return redirect('/admin/products');
    }
}
