<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\TransactionResource;
use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
	 */
	public function index()
	{
		return TransactionResource::collection(Transaction::all());

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 *
	 * @return TransactionResource
	 */
	public function store(Request $request)
	{
		$transaction = Transaction::create([
			'users_id'=> $request->users_id,
			'status'=> $request->status,
			'subtotal'=> $request->subtotal,
			'delivery_fee'=> $request->delivery_fee,
			'total_amount'=> $request->total_amount,
			'payment_method'=> $request->payment_method,
			'cc_type'=> $request->cc_type,
			'cc_number'=> $request->cc_number,
			'cc_expiry'=> $request->cc_expiry,
			'first_name'=> $request->first_name,
			'last_name'=> $request->last_name,
			'email'=> $request->email,
			'mobile_number'=> $request->mobile_number,
			'unit_floor'=> $request->unit_floor,
			'building'=> $request->building,
			'street'=> $request->street,
			'subdivision'=> $request->subdivision,
			'barangay'=> $request->barangay,
			'city'=> $request->city,
			'province'=> $request->province,
			'zip'=> $request->zip,
			'company_name'=> $request->company_name,
			'landmarks'=> $request->landmarks,
			'authorized_recipient'=> $request->authorized_recipient,
		]);




		return new TransactionResource($transaction);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Transaction  $transaction
	 *
	 * @return TransactionResource
	 */
	public function show(Transaction $transaction)
	{
		TransactionResource::withoutWrapping();

		return new TransactionResource($transaction);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Transaction  $transaction
	 *
	 * @return TransactionResource
	 */
	public function update(Request $request, Transaction $transaction)
	{
		$transaction->update($request->all());

		return new TransactionResource($transaction);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Transaction $transaction
	 *
	 * @return \Illuminate\Http\JsonResponse
	 * @throws \Exception
	 */
	public function destroy(Transaction $transaction)
	{
		$transaction->delete();

		return response()->json(null, 204);
	}
}
