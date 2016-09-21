<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model {

	protected $table = 'services';
	public $timestamps = true;

	public function servicehasreviews()
	{
		$this->hasMany('App\Review', 'service_id');
	}

	public function servicehaspictures()
	{
		return $this->hasMany('App\ServicePicture');
	}
        
        public function ShortDescription()
        {
            return substr($this->description, 0, 50)."...";;
        }
}