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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    return UserResource::collection(User::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
	        'shop_name' => $this->shop_name,
	        'first_name' => $this->first_name,
	        'last_name' => $this->last_name,
	        'email' => $this->email,
	        'password' => $this->password,
	        'role_id' => $this->role_id,
	        'mobile_number' => $this->mobile_number,
	        'birth_date' => $this->birth_date,
	        'gender' => $this->gender,
	        'unit_floor' => $this->unit_floor,
	        'building' => $this->building,
	        'street' => $this->street,
	        'subdivision' => $this->subdivision,
	        'barangay' => $this->barangay,
	        'city' => $this->city,
	        'province' => $this->province,
	        'zip' => $this->zip,
	        'company_name' => $this->company_name,
	        'landmarks' => $this->landmarks,
	        'authorized_recipient' => $this->authorized_recipient,
	        'is_profile_complete' => $this->is_profile_complete,
	        'created_at' => $this->created_at,
	        'updated_at' => $this->updated_at,
        ]);

        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
	    return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
	    // check if currently authenticated user is the owner of the book
	    if ($request->user()->id !== $user->id) {
		    return response()->json(['error' => 'You can only edit your own profile.'], 403);
	    }

	    $user->update($request->only(['title', 'description']));

	    return new BookResource($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
