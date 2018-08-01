<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ContactUsResource extends Resource
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
	        'name' => $this->name,
	        'email' => $this->email,
	        'mobile_number' => $this->mobile_number,
	        'message' => $this->message,
	        'created_at' => $this->created_at,
	        'updated_at' => $this->updated_at,
        ];
    }
}
