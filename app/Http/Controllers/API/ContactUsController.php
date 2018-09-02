<?php

namespace App\Http\Controllers\API;

use App\ContactUs;
use App\Http\Resources\ContactUsResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
	 */
	public function index()
	{
		return ContactUsResource::collection(ContactUs::all());

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 *
	 * @return ContactUsResource
	 */
	public function store(Request $request)
	{
		$contact_us = ContactUs::create([
			'name' => $request->name,
			'email' => $request->email,
			'mobile_number' => $request->mobile_number,
			'message' => $request->message,
		]);

		return new ContactUsResource($contact_us);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\ContactUs  $contact_us
	 *
	 * @return ContactUsResource
	 */
	public function show(ContactUs $contact_us)
	{
		ContactUsResource::withoutWrapping();

		return new ContactUsResource($contact_us);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\ContactUs  $contact_us
	 *
	 * @return ContactUsResource
	 */
	public function update(Request $request, ContactUs $contact_us)
	{
		$contact_us->update($request->all());

		return new ContactUsResource($contact_us);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param ContactUs id $contact_us
	 *
	 * @return \Illuminate\Http\JsonResponse
	 * @throws \Exception
	 */
	public function destroy($contact_us)
	{
		$record = ContactUs::find($contact_us);
		if (!$record) {
			return json_encode('No records found!');
		}

		if ($record->delete()) {
			return json_encode('success');
		} else {
			return json_encode('failed');
		}
	}
}
