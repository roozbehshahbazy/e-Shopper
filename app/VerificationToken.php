<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\User;


class VerificationToken extends Model
{
	public $timestamps = false;
	protected $fillable = ['token'];



	public function getRouteKeyName()
	{
		return 'token';
	}


	public function user()
	{
		return $this->belongsTo('App\User');
	}

}
