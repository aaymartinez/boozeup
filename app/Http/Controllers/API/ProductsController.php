<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\ProductsResource;
use App\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
	 */
	public function index()
	{
		return ProductsResource::collection(Products::all());

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 *
	 * @return ProductsResource
	 */
	public function store(Request $request)
	{
		$products = Products::create([
			'title' => $request->title,
			'brand_name' => $request->brand_name,
			'seller_name_id' => $request->seller_name_id,
			'price' => $request->price,
			'description' => $request->description,
			'booze_type_id' => $request->booze_type_id,
			'photos' => $request->photos,
			'quantity' => $request->quantity,
		]);

		return new ProductsResource($products);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Products  $products
	 *
	 * @return ProductsResource
	 */
	public function show($products)
	{
		$p = Products::findOrFail($products);

		return new ProductsResource($p);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Products  $products
	 *
	 * @return ProductsResource
	 */
	public function update(Request $request, Products $products)
	{
		$products->update($request->all());

		return new ProductsResource($products);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Products $products
	 *
	 * @return \Illuminate\Http\JsonResponse
	 * @throws \Exception
	 */
	public function destroy(Products $products)
	{
		$products->delete();

		return response()->json(null, 204);
	}
}
