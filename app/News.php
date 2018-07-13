<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class News extends Model
{
    use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
    protected $fillable = [
    	'booze_type_id', 'title', 'subject', 'description', 'photo'
    ];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [];


	public function booze_type()
	{
		return $this->belongsTo(BoozeTypes::class);
	}
}
