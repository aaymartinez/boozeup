<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ProductsResource extends Resource
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
	        'title' => $this->title,
	        'brand_name' => $this->brand_name,
	        'seller_name_id' => $this->seller_name_id,
	        'price' => $this->price,
	        'description' => $this->description,
	        'booze_type_id' => $this->booze_type_id,
	        'photos' => $this->photos,
	        'quantity' => $this->quantity,
	        'created_at' => $this->created_at,
	        'updated_at' => $this->updated_at,
        ];
    }
}
