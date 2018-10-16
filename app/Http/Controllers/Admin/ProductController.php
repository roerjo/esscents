<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Return all products
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.products',compact('products'));
    }

    /**
     * Remove a product from the database
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function destroy(int $id)
    {
        $product = Product::find($id);

        // remove the product image
        unlink($product->picture_url);

        $product->destroy($id);

        return redirect('/admin/products');
    }

    /**
     * Add new product page
     *
     * @return \Illuminate\View\View
     */
    public function newProduct()
    {
        return view('admin.new');
    }

    /**
     * Create a new product
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function add(Request $request)
    {
        $product = new Product();
        $product->type = $request->get('type');
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');

        $imagePath = "images/{$request->type}/{$request->name}.jpg";
        $product->picture_url = $imagePath;
        $request->file('picture_url')->move(
            base_path()."/public/images/{$imagePath}"
        );

        $product->save();

        return redirect('/admin/products');
    }

    /**
     * Show a product's details
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show(int $id)
    {
    	$product = Product::find($id);

    	return view('admin.update', compact('product'));
    }

    /**
     * Update a product
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function update(Request $request, int $id)
    {
    	$product = Product::find($id);

    	if ($request->picture_url) {
    		if(file_exists($product->picture_url)) {
                unlink($product->picture_url);
            }
            $imagePath = "images/{$request->type}/{$request->name}.jpg";
    		$product->picture_url = $imagePath;
        	$request->file('picture_url')->move(
                base_path()."/public/images/{$imagePath}"
            );
        } elseif ($request->name != $product->name ||
                  $request->type != $product->type
        ) {
            $imagePath = "images/{$request->type}/{$request->name}.jpg";
            copy($product->picture_url, $imagePath);
            unlink($product->picture_url);
            $product->picture_url = $imagePath;
        }

    	$product->type = $request->get('type');
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');

        $product->save();

    	return redirect('/admin/products');
    }
}
