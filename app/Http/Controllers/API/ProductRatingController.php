<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\ProductRatingResource;
use App\ProductRating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductRatingController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
	 */
	public function index()
	{
		return ProductRatingResource::collection(ProductRating::all());

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 *
	 * @return ProductRatingResource
	 */
	public function store(Request $request)
	{
		$product_rating = ProductRating::create([
			'products_id' => $request->products_id,
			'user_id' => $request->user_id,
			'rating' => $request->rating,
			'title' => $request->title,
			'description' => $request->description,
		]);

		return new ProductRatingResource($product_rating);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\ProductRating  $product_rating
	 *
	 * @return ProductRatingResource
	 */
	public function show(ProductRating $product_rating)
	{
		ProductRatingResource::withoutWrapping();

		return new ProductRatingResource($product_rating);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\ProductRating  $product_rating
	 *
	 * @return ProductRatingResource
	 */
	public function update(Request $request, ProductRating $product_rating)
	{
		// check if currently authenticated user is the owner of the book
		if ($request->user()->id !== $product_rating->id) {
			return response()->json(['error' => 'You can only edit your own profile.'], 403);
		}

		$product_rating->update($request->all());

		return new ProductRatingResource($product_rating);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param ProductRating $product_rating
	 *
	 * @return \Illuminate\Http\JsonResponse
	 * @throws \Exception
	 */
	public function destroy(ProductRating $product_rating)
	{
		$product_rating->delete();

		return response()->json(null, 204);
	}
}
