<?php

namespace App\Http\Controllers\API;

use App\BoozeTypes;
use App\Http\Resources\BoozeTypesResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BoozeTypesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
	 */
	public function index()
	{
		try {

			return BoozeTypesResource::collection( BoozeTypes::all() );

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
	 * @return BoozeTypesResource
	 */
	public function store(Request $request)
	{
		try {

			$user = BoozeTypes::create([
				'type' => $request->type,
				'description' => $request->description,
				'photo' => $request->photo,
			]);

			return new BoozeTypesResource($user);

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
	 * @param  \App\BoozeTypes id $booze
	 *
	 * @return BoozeTypesResource
	 */
	public function show($booze)
	{
		try {

			$b = BoozeTypes::findOrFail($booze);

			return new BoozeTypesResource($b);

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
	 * @param  \App\User  $user
	 *
	 * @return BoozeTypesResource
	 */
	public function update(Request $request, BoozeTypes $booze)
	{
		try {

			$booze->update($request->all());

			return new BoozeTypesResource($booze);

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
	 * @param BoozeTypes id $booze
	 *
	 * @return \Illuminate\Http\JsonResponse
	 * @throws \Exception
	 */
	public function destroy($booze)
	{
		try {

			$record = BoozeTypes::find($booze);
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
