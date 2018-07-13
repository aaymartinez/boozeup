<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function ageChecker( Request $request ) {

		$rules = [
			'dob' => 'required|date|before:-18 years'
//			'month' => 'required|digits:2',
//			'day'   => 'required|digits:2',
//			'year'  => 'required|digits:4',
		];

		$this->validate( $request, $rules );

		return response()->json();
	}
}