<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model {

	protected $table = 'services';
	public $timestamps = true;

	public function servicehasreviews()
	{
		return $this->hasMany('Review');
	}

	public function servicehaspictures()
	{
		return $this->hasMany('ServicePicture');
	}

}