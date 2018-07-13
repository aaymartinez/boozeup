<?php

namespace App\Http\Controllers\Shared;

use App\Carts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//    	$carts = Carts::all()->where('users_id', '=', Auth::id())->where('transactions_id', '=', '')->where('bought', '=', false);
//
//        return view('shared.carts', compact('carts'));
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
	 * @param Request $request
	 *
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
	 */
	public function store(Request $request)
    {
	    $rules = [
		    'quantity' => 'required|integer',
		    'price' => 'required',
		    'users_id' => 'required',
		    'products_id' => 'required',
	    ];

	    $this->validate($request, $rules);

	    Carts::create($request->all());

	    return response('Product was added to the Cart successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function show(Carts $carts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function edit(Carts $carts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carts $carts)
    {
        //
    }


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
    {
	    $cart = Carts::findOrFail($id);

	    $cart->delete();

		return response()->json([
			'success' => 'success',
			'id' => $id,
			'message' => 'Product was remove to the Cart successfully.'
		], 200);
    }
}
