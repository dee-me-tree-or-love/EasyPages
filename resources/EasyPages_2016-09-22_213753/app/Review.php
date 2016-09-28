<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model {

	protected $table = 'reviews';
	public $timestamps = true;

	public function reviewhaspictures()
	{
		return $this->hasMany('ReviewPicture');
	}

}