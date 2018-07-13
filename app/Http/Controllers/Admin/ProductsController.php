<?php

namespace App\Http\Controllers\Admin;

use App\BoozeTypes;
use App\Http\Controllers\Controller;
use App\products;
use App\User;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$products = Products::all();
	    return view('admin.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $booze = BoozeTypes::all();
	    $users =  User::all();
	    $seller = $users->where('role_id', '=', 3);
        return view('admin.add-product', compact('booze', 'seller'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $dir = 'products';

	    $rules = [
		    'title' => 'required|string|max:255',
		    'brand_name' => 'required|string|max:255',
		    'price' => 'required|regex:/^\d*(\.\d{1,2})?$/',
		    'description' => 'string|max:500',
		    'photo' => 'image|mimes:jpeg,jpg,png,bmp',
	    ];

	    $this->validate($request, $rules);

	    $product = Products::create($request->all());

	    if ($request->has('photo')) {
		    $filename = $request->file('photo')->store('public/'.$dir);
		    $product->photos = $filename;
		    $product->save();
	    }

	    return redirect('/admin/products')
		    ->with('success', 'Product added successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products ID
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    Products::find($id)->delete();

	    return redirect('/admin/products')
		    ->with('success', 'Product deleted successfully!');
    }
}
