<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
		if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){

			$user = Auth::user();

			$success['token'] = $user->createToken('BoozeUp')->accessToken;

			$user->api_token = $success['token'];
			$user->save();

			return response()->json(['success' => $success], $this->successStatus);

		} else {

			return response()->json(['error'=>'Unauthorised'], 401);

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
	}



	public function getDetails()
	{

		$user = Auth::user();

		return response()->json(['success' => $user], $this->successStatus);
	}


}
