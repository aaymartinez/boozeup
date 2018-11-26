<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\UserResource;
use App\User;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
    	try {

	        return UserResource::collection(User::all());

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
     * @return UserResource
     */
    public function store(Request $request)
    {
    	try {

//            $dir = 'user-profile';
//
//            // save image
//            if ($request->has('id_verification')) {
//                $filename = $request->file('id_verification')->store('public/'.$dir);
//                $request->id_verification = $filename;
//            }

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
		        'id_verification' => $request->id_verification,
	        ]);

	        return new UserResource($user);

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
     * @param  \App\User  $user
     *
     * @return UserResource
     */
    public function show(User $user)
    {
    	try {

	        UserResource::withoutWrapping();

		    return new UserResource($user);

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
     * @return UserResource
     */
    public function update(Request $request, User $user)
    {
    	try {

		    $user->update($request->all());

		    // save image
//		    $dir = 'user-profile';
//		    if ($request->has('id_verification')) {
//			    $filename = $request->file('id_verification')->store('public/'.$dir);
//			    $user->id_verification = $filename;
//			    $user->save();
//		    }


		    return new UserResource($user);

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
	 * @param User id $user
	 *
	 * @return \Illuminate\Http\JsonResponse
	 * @throws \Exception
	 */
	public function destroy($user)
    {
    	try {

		    $record = User::find($user);
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


    /**
     * Upload the image resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return string
     */
    public function uploadPhoto(Request $request)
    {
        try {
            // save image
            $dir = 'user-profile';
            $filePath = '';

            $data = $request->id_verification;
            if ( $data ) {

                $image = $data;  // your base64 encoded
                $image = str_replace('data:image/png;base64,', '', $image);
                $image = str_replace(' ', '+', $image);
                $imageName = str_random(20).'.'.'png';
                $filePath = 'public/' . $dir . "/". $imageName;
                Storage::put($filePath, base64_decode($image));
            }

            return $filePath;

        } catch (\Exception $e) {
            return response()->json( [
                'errors'  => $e->getMessage(),
                'message' => 'Please try again',
                'status'  => false
            ], 200 );
        }

    }
}
