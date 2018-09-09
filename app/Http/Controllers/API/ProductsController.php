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
		try {

			return ProductsResource::collection(Products::all());

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
	 * @return ProductsResource
	 */
	public function store(Request $request)
	{
		try {

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
	 * @param  \App\Products  $products
	 *
	 * @return ProductsResource
	 */
	public function show($products)
	{
		try {

			$p = Products::findOrFail($products);

			return new ProductsResource($p);

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
	 * @param  \App\Products  $products
	 *
	 * @return ProductsResource
	 */
	public function update(Request $request, Products $products)
	{
		try {

			$products->update($request->all());

			return new ProductsResource($products);

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
	 * @param Products id $products
	 *
	 * @return \Illuminate\Http\JsonResponse
	 * @throws \Exception
	 */
	public function destroy($products)
	{
		try {

			$record = Products::find($products);
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
