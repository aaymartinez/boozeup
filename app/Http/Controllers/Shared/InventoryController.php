<?php

namespace App\Http\Controllers\Shared;

use App\BoozeTypes;
use App\Carts;
use App\Http\Controllers\Controller;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$products = Products::all()
		    ->where('seller_name_id', '==', Auth::user()->id);

	    $booze = BoozeTypes::all();
	    $seller = Auth::user()->id;

	    $carts = Carts::all()->where('users_id', '=', Auth::id())->where('transactions_id', '=', '')->where('bought', '=', false);

        return view('shared.inventory', compact('products', 'booze', 'seller', 'carts'));
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
	    $dir = 'products';

	    $rules = [
		    'title' => 'required|string|max:255',
		    'brand_name' => 'required|string|max:255',
		    'price' => 'required|regex:/^\d*(\.\d{1,2})?$/',
		    'description' => 'string|max:500',
		    'photo' => 'image|mimes:jpeg,jpg,png,bmp',
		    'quantity' => 'required|integer|min:1',
	    ];

	    $this->validate($request, $rules);

	    $product = Products::create($request->all());

	    if ($request->has('photo')) {
		    $filename = $request->file('photo')->store('public/'.$dir);
		    $product->photos = $filename;
		    $product->save();
	    }

	    return redirect('/inventory')
		    ->with('success', 'Product added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::find($id);
	    $booze = BoozeTypes::all();

	    $carts = Carts::all()->where('users_id', '=', Auth::id())
	                  ->where('transactions_id', '=', '')
	                  ->where('bought', '=', false);

        return view('shared.inventory-edit', compact('product', 'booze', 'carts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
	    $dir = 'products';

	    $product = Products::find($id);

	    $rules = [
		    'title' => 'required|string|max:255',
		    'brand_name' => 'required|string|max:255',
		    'price' => 'required|regex:/^\d*(\.\d{1,2})?$/',
		    'description' => 'string|max:500',
		    'photo' => 'image|mimes:jpeg,jpg,png,bmp',
		    'quantity' => 'required|integer|min:1',
	    ];


	    $this->validate($request, $rules);

	    $product->update($request->all());

	    if ($request->has('photo')) {
		    if ($product->photos){
			    Storage::delete($product->photos);
		    }

		    $filename = $request->file('photo')->store('public/'.$dir);
		    $product->photos = $filename;
		    $product->save();
	    }

	    return redirect('/inventory')
		    ->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$product = Products::findOrFail($id);

	    if ($product->photos){
		    Storage::delete($product->photos);
	    }

		$product->delete();

	    return redirect('/inventory')
		    ->with('success', 'Product deleted successfully!');
    }
}
