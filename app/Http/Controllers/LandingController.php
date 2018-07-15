<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class LandingController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function ageChecker( Request $request ) {

		$rules = [
			'dob' => 'required|date|before:-18 years'
		];

		$this->validate( $request, $rules );

		session(['user_age' => $request->dob]);

		return response()->json();
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index() {
		return view('welcome');
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function registerSeller() {
		return view('auth.register-seller');
	}

	public function checkSession() {

	}
}