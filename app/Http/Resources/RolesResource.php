<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class RolesResource extends Resource
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
	        'role'=> $this->role,
	        'created_at' => $this->created_at,
	        'updated_at' => $this->updated_at,
        ];
    }
}
