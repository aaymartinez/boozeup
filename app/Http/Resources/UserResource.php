<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class UserResource extends Resource
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
		    'id' => $this->id,
		    'shop_name' => $this->shop_name,
		    'first_name' => $this->first_name,
		    'last_name' => $this->last_name,
		    'email' => $this->email,
//		    'password' => $this->password,
		    'role_id' => $this->role_id,
		    'mobile_number' => $this->mobile_number,
		    'birth_date' => $this->birth_date,
		    'gender' => $this->gender,
		    'unit_floor' => $this->unit_floor,
		    'building' => $this->building,
		    'street' => $this->street,
		    'subdivision' => $this->subdivision,
		    'barangay' => $this->barangay,
		    'city' => $this->city,
		    'province' => $this->province,
		    'zip' => $this->zip,
		    'company_name' => $this->company_name,
		    'landmarks' => $this->landmarks,
		    'authorized_recipient' => $this->authorized_recipient,
		    'is_profile_complete' => $this->is_profile_complete,
		    'created_at' => $this->created_at,
		    'updated_at' => $this->updated_at,
	    ];
    }
}
