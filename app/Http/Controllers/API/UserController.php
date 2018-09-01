<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
	    return UserResource::collection(User::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return UserResource
     */
    public function store(Request $request)
    {
        $user = User::create([
	        'shop_name' => $request->shop_name,
	        'first_name' => $request->first_name,
	        'last_name' => $request->last_name,
	        'email' => $request->email,
	        'password' => $request->password,
	        'role_id' => $request->role_id,
	        'mobile_number' => $request->mobile_number,
	        'birth_date' => $request->birth_date,
	        'gender' => $request->gender,
	        'unit_floor' => $request->unit_floor,
	        'building' => $request->building,
	        'street' => $request->street,
	        'subdivision' => $request->subdivision,
	        'barangay' => $request->barangay,
	        'city' => $request->city,
	        'province' => $request->province,
	        'zip' => $request->zip,
	        'company_name' => $request->company_name,
	        'landmarks' => $request->landmarks,
	        'authorized_recipient' => $request->authorized_recipient,
	        'is_profile_complete' => $request->is_profile_complete,
        ]);

        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     *
     * @return UserResource
     */
    public function show(User $user)
    {
    	UserResource::withoutWrapping();

	    return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     *
     * @return UserResource
     */
    public function update(Request $request, User $user)
    {
	    $user->update($request->all());

	    return new UserResource($user);
    }


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param User $user
	 *
	 * @return \Illuminate\Http\JsonResponse
	 * @throws \Exception
	 */
	public function destroy(User $user)
    {
	    $user->delete();

	    return response()->json(null, 204);
    }
}
