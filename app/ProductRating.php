<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ProductRating extends Model
{
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'products_id', 'user_id', 'rating', 'title', 'description'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [];


	function product() {
		return $this->belongsTo( Products::class );
	}
//
//	function user() {
//		return $this->belongsTo( User::class );
//	}

}
