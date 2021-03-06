<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Profile;
use App\Service;

class Review extends Model {
    protected $primaryKey = 'review_id';

    public $fillable = ['title','description','rating','service_id','review_id'];

    protected $table = 'reviews';
    public $timestamps = true;

    public function reviewhaspictures() {
        return $this->hasMany('App\ReviewPicture');
    }
    
    public function relprofile() {
        return $this->belongsTo('App\Profile','profile_id','profile_id');
    }
     public function relservice() {
        return $this->belongsTo('App\Service','service_id','service_id');
    }
    public function comments() {
        return $this->hasMany('App\Comment','review_id')->where('thread_id',0);
    }

//    public function getprofile() {
//        $profile = Profile::where('profile_id', $this->profile_id)->first();
//        return $profile;
//    }

//    
//    public function getservice() {
//        $service = Service::where('service_id', $this->service_id)->first();
//        return $service;
//    }

    public function ShortDescription($limit) {
        return substr($this->description, 0, $limit) . "...";
    }

}
