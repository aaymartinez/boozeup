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
		return WishlistResource::collection(Wishlist::all());

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
		$wishlist = Wishlist::create([
			'products_id' => $request->products_id,
			'users_id' => $request->users_id,
			'quantity' => $request->quantity,
			'price' => $request->price,
		]);

		return new WishlistResource($wishlist);
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
		WishlistResource::withoutWrapping();

		return new WishlistResource($wishlist);
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
		// check if currently authenticated user is the owner of the book
		if ($request->user()->id !== $wishlist->users_id) {
			return response()->json(['error' => 'You can only edit your own profile.'], 403);
		}

		$wishlist->update($request->all());

		return new WishlistResource($wishlist);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Wishlist $wishlist
	 *
	 * @return \Illuminate\Http\JsonResponse
	 * @throws \Exception
	 */
	public function destroy(Wishlist $wishlist)
	{
		$wishlist->delete();

		if($wishlist->delete()) {
			return $this->response->withItem($wishlist);
		} else {
			return $this->response->errorInternalError('Could not delete a task');
		}


	}
}
