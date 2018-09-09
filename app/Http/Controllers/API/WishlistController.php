<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\WishlistResource;
use App\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WishlistController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
	 */
	public function index()
	{
		try {

			return WishlistResource::collection(Wishlist::all());

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
	 * @return WishlistResource
	 */
	public function store(Request $request)
	{
		try {

			$wishlist = Wishlist::create([
				'products_id' => $request->products_id,
				'users_id' => $request->users_id,
				'quantity' => $request->quantity,
				'price' => $request->price,
			]);

			return new WishlistResource($wishlist);

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
	 * @param  \App\Wishlist  $wishlist
	 *
	 * @return WishlistResource
	 */
	public function show(Wishlist $wishlist)
	{
		try {

			WishlistResource::withoutWrapping();

			return new WishlistResource($wishlist);

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
	 * @param  \App\Wishlist  $wishlist
	 *
	 * @return WishlistResource
	 */
	public function update(Request $request, Wishlist $wishlist)
	{
		try {

			$wishlist->update($request->all());

			return new WishlistResource($wishlist);

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
	 * @param Wishlist id $wishlist
	 *
	 * @return \Illuminate\Http\JsonResponse
	 * @throws \Exception
	 */
	public function destroy($wishlist)
	{
		try {

			$record = Wishlist::find($wishlist);
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
