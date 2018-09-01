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
		return BoozeTypesResource::collection(BoozeTypes::all());

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
		$user = BoozeTypes::create([
			'type' => $request->type,
			'description' => $request->description,
			'photo' => $request->photo,
		]);

		return new BoozeTypesResource($user);
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
		$b = BoozeTypes::findOrFail($booze);

		return new BoozeTypesResource($b);
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
		$booze->update($request->all());

		return new BoozeTypesResource($booze);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param BoozeTypes $booze
	 *
	 * @return \Illuminate\Http\JsonResponse
	 * @throws \Exception
	 */
	public function destroy(BoozeTypes $booze)
	{
		$booze->delete();

		return response()->json(null, 204);
	}
}
