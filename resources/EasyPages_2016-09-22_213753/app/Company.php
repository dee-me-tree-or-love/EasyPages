<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {

	protected $table = 'companies';
	public $timestamps = true;

	public function companyowner()
	{
		return $this->hasOne('User', 'user_id');
	}

	public function companyservices()
	{
		return $this->hasMany('Service');
	}

}