<?php

namespace App\Http\Controllers\Shared;

use App\Carts;
use App\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

	    $carts = Carts::all()->where('users_id', '=', Auth::id())
	                         ->where('transactions_id', '=', '')
	                         ->where('bought', '=', false);

        return view('shared.products', compact('products', 'carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	    $product = Products::find($id);
		$user_id = Auth::id();

	    $carts = Carts::all()->where('users_id', '=', Auth::id())
	                         ->where('transactions_id', '=', '')
	                         ->where('bought', '=', false);

		// for quantity
		$qty = [];
		for ($i = 1; $i <= $product->quantity ; $i++) {
			$qty[$i] = $i;
		}


	    return view('shared.product-details', compact('product', 'user_id', 'qty', 'carts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
}
