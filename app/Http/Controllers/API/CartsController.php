<?php

namespace App\Http\Controllers\API;

use App\Carts;
use App\Http\Resources\CartsResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
	 */
	public function index()
	{
		return CartsResource::collection(Carts::all());

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 *
	 * @return CartsResource
	 */
	public function store(Request $request)
	{
		$cart = Carts::create([
			'products_id' => $request->product_id,
			'users_id' => $request->users_id,
			'quantity' => $request->quantity,
			'price' => $request->price,
			'transactions_id' => $request->transactions_id,
			'bought' => $request->bought,
		]);

		return new CartsResource($cart);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Carts  $cart
	 *
	 * @return CartsResource
	 */
	public function show(Carts $cart)
	{
		CartsResource::withoutWrapping();

		return new CartsResource($cart);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Carts  $cart
	 *
	 * @return CartsResource
	 */
	public function update(Request $request, Carts $cart)
	{
		$cart->update($request->all());

		return new CartsResource($cart);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Carts id $cart
	 *
	 * @return \Illuminate\Http\JsonResponse
	 * @throws \Exception
	 */
	public function destroy($cart)
	{
		$record = Carts::find($cart);
		if (!$record) {
			return json_encode('No records found!');
		}

		if ($record->delete()) {
			return json_encode('success');
		} else {
			return json_encode('failed');
		}
	}
}
