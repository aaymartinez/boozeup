<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class ApiAuthController extends RegisterController
{

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'first_name' => 'required|string|max:255',
			'last_name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|string|min:6|confirmed',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return \App\User
	 */
	protected function create(array $data)
	{
		try {
			return User::create([
				'role_id' => $data['role_id'],
				'first_name' => $data['first_name'],
				'last_name' => $data['last_name'],
				'email' => $data['email'],
				'password' => bcrypt($data['password']),
			]);
		} catch (\Exception $e) {
			return response()->json( [
				'errors'  => $e->getMessage(),
				'message' => 'Please try again',
				'status'  => false
			], 200 );
		}
	}

	public function register(Request $request)
	{
		try {
			$errors = $this->validator($request->all())->errors();

			if(count($errors))
			{
				return response(['errors' => $errors], 401);
			}

			event(new Registered($user = $this->create($request->all())));

			$this->guard()->login($user);

			return response(['user' => $user]);

		} catch (\Exception $e) {
			return response()->json( [
				'errors'  => $e->getMessage(),
				'message' => 'Please try again',
				'status'  => false
			], 200 );
		}
	}

}
