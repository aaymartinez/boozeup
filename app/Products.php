<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Products extends Model
{
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'title', 'brand_name', 'seller_name_id', 'price', 'description', 'booze_type_id', 'photos', 'quantity'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [];


	function booze_type() {
		return $this->belongsTo( BoozeTypes::class );
	}

	function seller_name() {
		return $this->belongsTo( User::class );
	}

	function ratings() {
		return $this->hasMany(ProductRating::class);
	}


}
