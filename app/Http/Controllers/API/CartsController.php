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
		try {

			return CartsResource::collection(Carts::all());

		} catch (\Exception $e) {
			return response()->json( [
				'errors'  => $e->getMessage(),
				'message' => 'Please try again',
				'status'  => false
			], 200 );
		}
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
		try {

			$cart = Carts::create([
				'products_id' => $request->product_id,
				'users_id' => $request->users_id,
				'quantity' => $request->quantity,
				'price' => $request->price,
				'transactions_id' => $request->transactions_id,
				'bought' => $request->bought,
			]);

			return new CartsResource($cart);

		} catch (\Exception $e) {
			return response()->json( [
				'errors'  => $e->getMessage(),
				'message' => 'Please try again',
				'status'  => false
			], 200 );
		}
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
		try {

			CartsResource::withoutWrapping();

			return new CartsResource($cart);

		} catch (\Exception $e) {
			return response()->json( [
				'errors'  => $e->getMessage(),
				'message' => 'Please try again',
				'status'  => false
			], 200 );
		}
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
		try {

			$cart->update($request->all());

			return new CartsResource($cart);

		} catch (\Exception $e) {
			return response()->json( [
				'errors'  => $e->getMessage(),
				'message' => 'Please try again',
				'status'  => false
			], 200 );
		}
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
		try {

			$record = Carts::find($cart);
			if (!$record) {
				return json_encode('No records found!');
			}

			if ($record->delete()) {
				return json_encode('success');
			} else {
				return json_encode('failed');
			}

		} catch (\Exception $e) {
			return response()->json( [
				'errors'  => $e->getMessage(),
				'message' => 'Please try again',
				'status'  => false
			], 200 );
		}
	}
}
