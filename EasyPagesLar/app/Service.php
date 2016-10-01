<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Company;
use App\Review;

class Service extends Model {
	protected $primaryKey = 'service_id';
	

	protected $table = 'services';
	
        public $fillable = ['title','description','company_id','price'];
	public $timestamps = true;

	
	public function serreviews()
	{
		return $this->hasMany('App\Review', 'service_id', 'service_id');
	}
	public function relcompany()
	{
		return $this->belongsTo('App\Company', 'company_id', 'company_id');
	}

	public function servicehaspictures()
	{
		return $this->hasMany('App\ServicePicture');
	}
	public function ShortDescription()
	{
		return substr($this->description, 0, 50)."...";
	}
        
}
