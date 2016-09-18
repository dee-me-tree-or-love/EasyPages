<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

	protected $table = 'profiles';
	public $timestamps = true;

	public function profilehasuserdata()
	{
		return $this->hasOne('User', 'user_id');
	}

	public function profilehasreviews()
	{
		return $this->hasMany('Review');
	}

	public function avatars()
	{
		return $this->hasOne('ProfilePicture');
	}

}