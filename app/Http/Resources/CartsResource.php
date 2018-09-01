<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class CartsResource extends Resource
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
	        'users_id' => $this->users_id,
	        'quantity' => $this->quantity,
	        'price' => $this->price,
	        'transactions_id' => $this->transactions_id,
	        'bought' => $this->bought,
	        'created_at' => $this->created_at,
	        'updated_at' => $this->updated_at,
        ];
    }
}
