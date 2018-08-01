<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ProductRatingResource extends Resource
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
	        'products_id' => $this->products_id,
	        'user_id' => $this->user_id,
	        'rating' => $this->rating,
	        'title' => $this->title,
	        'description' => $this->description,
	        'created_at' => $this->created_at,
	        'updated_at' => $this->updated_at,
        ];
    }
}
