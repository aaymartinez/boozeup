<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
	    'role_id', 'shop_name', 'first_name', 'last_name', 'mobile_number', 'birth_date', 'gender',
	    'unit_floor', 'building', 'street', 'subdivision', 'barangay', 'city', 'province', 'zip',
	    'company_name', 'landmarks', 'authorized_recipient', 'is_profile_complete',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	public function role()
	{
		return $this->belongsTo(Roles::class);
	}
}
