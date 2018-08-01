<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class NewsResource extends Resource
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
	        'booze_type_id' => $this->booze_type_id,
	        'title' => $this->title,
	        'subject' => $this->subject,
	        'description' => $this->description,
	        'photo' => $this->photo,
	        'created_at' => $this->created_at,
	        'updated_at' => $this->updated_at,
        ];
    }
}
