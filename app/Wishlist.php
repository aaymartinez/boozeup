<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Wishlist extends Model
{
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'products_id', 'users_id', 'quantity', 'price'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [];


	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	function users() {
		return $this->belongsTo( User::class );
	}


	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	function products() {
		return $this->belongsTo( Products::class );
	}
}
