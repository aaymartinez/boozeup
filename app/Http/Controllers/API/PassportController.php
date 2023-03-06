<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;


class PassportController extends Controller
{

	public $successStatus = 200;

	/**
	 * Login API
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function login(){
		try {

			if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){

				$user = Auth::user();

				$success['token'] = $user->createToken('BoozeUp')->accessToken;

				$user->api_token = $success['token'];
				$user->save();

				return response()->json([
					'success' => $success,
					'id' => $user->id,
				], $this->successStatus);

			} else {
				return response()->json(['error'=>'Unauthorised'], 401);
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
	 * Register API
	 *
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function register(Request $request)
	{
		try {

			$validator = Validator::make($request->all(), [
				'email' => 'required|string|email|max:255|unique:users',
				'password' => 'required|string|min:6',
			]);

			if ($validator->fails()) {
				return response()->json(['error'=>$validator->errors()], 401);
			}

			$input = $request->all();

			$input['password'] = bcrypt($input['password']);

			$user = User::create($input);

			$success['token'] = $user->createToken('BoozeUp')->accessToken;

			return response()->json(['success'=>$success], $this->successStatus);

		} catch (\Exception $e) {
			return response()->json( [
				'errors'  => $e->getMessage(),
				'message' => 'Please try again',
				'status'  => false
			], 200 );
		}
	}


	/**
	 * Change password
	 *
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function changePassword(Request $request)
	{
		try {

			$user = Auth::user();

			// validate password
			$validator = Validator::make( $request->all(), [
				'old_password' => 'required|string|min:6',
				'password'     => 'required|string|min:6|confirmed',
//				'password_confirmation'   => 'required|same:password'
			] );

			if ($validator->fails()) {
				return response()->json(['error'=>$validator->errors()], 400);
			}

			// check old password
			$old = $request->old_password;
			$current = $user->getAuthPassword();
			$new = $request->password;

			if ( Hash::check( $old, $current ) && !Hash::check( $new, $current ) ) {

				// the new and old password must not be the same
				$user->password = bcrypt( $new );

				if ( $user->save() ) {
					return response()->json( [ 'success' => 'success' ], $this->successStatus );
				}
			} else {
				return response()->json( [ 'error' => 'Current and new password must not be the same or incorrect current password.' ], 400 );
			}

		} catch (\Exception $e) {
			return response()->json([
				'errors' => $e->getMessage(),
				'message' => 'Please try again',
				'status' => false
			], 200);
		}
	}

}
