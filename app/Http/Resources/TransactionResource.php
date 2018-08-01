<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class TransactionResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
			'id'=> $this->id,
			'users_id'=> $this->users_id,
			'status'=> $this->status,
			'subtotal'=> $this->subtotal,
			'delivery_fee'=> $this->delivery_fee,
			'total_amount'=> $this->total_amount,
			'payment_method'=> $this->payment_method,
			'cc_type'=> $this->cc_type,
			'cc_number'=> $this->cc_number,
			'cc_expiry'=> $this->cc_expiry,
			'first_name'=> $this->first_name,
			'last_name'=> $this->last_name,
			'email'=> $this->email,
			'mobile_number'=> $this->mobile_number,
			'unit_floor'=> $this->unit_floor,
			'building'=> $this->building,
			'street'=> $this->street,
			'subdivision'=> $this->subdivision,
			'barangay'=> $this->barangay,
			'city'=> $this->city,
			'province'=> $this->province,
			'zip'=> $this->zip,
			'company_name'=> $this->company_name,
			'landmarks'=> $this->landmarks,
			'authorized_recipient'=> $this->authorized_recipient,
			'created_at'=> $this->created_at,
			'updated_at'=> $this->updated_at,
        ];
    }
}
