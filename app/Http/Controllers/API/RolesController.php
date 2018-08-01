<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\RolesResource;
use App\Roles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
	 */
	public function index()
	{
		return RolesResource::collection(Roles::all());

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 *
	 * @return RolesResource
	 */
	public function store(Request $request)
	{
		$roles = Roles::create([
			'role'=> $request->role,
		]);

		return new RolesResource($roles);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Roles  $roles
	 *
	 * @return RolesResource
	 */
	public function show(Roles $roles)
	{
		RolesResource::withoutWrapping();

		return new RolesResource($roles);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Roles  $roles
	 *
	 * @return RolesResource
	 */
	public function update(Request $request, Roles $roles)
	{
		$roles->update($request->all());

		return new RolesResource($roles);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Roles $roles
	 *
	 * @return \Illuminate\Http\JsonResponse
	 * @throws \Exception
	 */
	public function destroy(Roles $roles)
	{
		$roles->delete();

		return response()->json(null, 204);
	}
}
