<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Service;

class Company extends Model {

    protected $table = 'companies';
    public $timestamps = true;

    public function getservices() {
        $services = Service::where('company_id', $this->company_id)->get();
        if (count($services) > 0) {
            return $services;
        } else {
            return null;
        }
    }

    public function companyowner() {
        return $this->hasOne('User', 'user_id');
    }

    public function companyservices() {
        $services = $this->hasMany('Service');
        
    }

}
