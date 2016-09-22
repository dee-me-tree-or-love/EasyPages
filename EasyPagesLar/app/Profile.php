<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

	protected $table = 'profiles';
	public $timestamps = true;
        public $fillable = ['fname','lname','sex','dob','addres_id'];
        
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