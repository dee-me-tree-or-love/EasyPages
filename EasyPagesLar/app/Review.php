<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Profile;

class Review extends Model {

	protected $table = 'reviews';
	public $timestamps = true;

	public function reviewhaspictures()
	{
		return $this->hasMany('App\ReviewPicture');
	}
        public function getprofile()
        {
            return Profile::where('profile_id', $this->profile_id)->first();
        }
        
        public function ShortDescription($limit)
        {
            return substr($this->description, 0, $limit)."...";
        }
        
}