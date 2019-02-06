<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Transaction extends Model
{
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		// payment
		'users_id', 'status', 'subtotal', 'delivery_fee', 'total_amount', 'payment_method', 'cc_type', 'cc_number', 'cc_expiry',
		// basic info
		'first_name', 'last_name', 'email', 'mobile_number',
		// address
		'unit_floor', 'building', 'street', 'subdivision', 'barangay', 'city', 'province', 'zip', 'company_name',
		'landmarks', 'authorized_recipient',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [];

    function carts() {
        return $this->hasMany(Carts::class, 'transactions_id');
    }


}
