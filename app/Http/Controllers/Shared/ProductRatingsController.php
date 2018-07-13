<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use App\ProductRating;
use Illuminate\Http\Request;

class ProductRatingsController extends Controller
{
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$rules = [
			'products_id' => 'required',
			'user_id' => 'required',
			'rating' => 'required',
			'title' => 'required|string|max:255',
			'description' => 'required|string',
		];

		$this->validate($request, $rules);

		ProductRating::create($request->all());

		return redirect('/products/'.$request->input('products_id') )
			->with('success', 'Review submitted successfully!');

	}
}
