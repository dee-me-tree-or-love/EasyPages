<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Review;

class Profile extends Model {

	protected $primaryKey = 'profile_id';
	protected $table = 'profiles';
	public $timestamps = true;
        public $fillable = ['fname','lname','sex','dob','addres_id'];
    
    public function getreviews() {
        $reviews = Review::where('profile_id', $this->profile_id)->get();
        if (count($reviews) > 0) {
            return $reviews;
        } else {
            return null;
        }
    }
        
	public function profilehasuserdata()
	{
		return $this->hasOne('User', 'user_id');
	}

	public function profilehasreviews()
	{
		return $this->hasMany('App\Review','profile_id','profile_id');
	}

	public function avatars()
	{
		return $this->hasOne('ProfilePicture');
	}

}