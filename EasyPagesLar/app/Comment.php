<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Review;


class Comment extends Model
{
    protected $primaryKey = 'comment_id';


    public $fillable = ['text','user_id','review_id','thread_id','author'];
    protected $table = 'comments';
    public $timestamps = true;

    public function commentauthor() {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function commentreview() {
        return $this->belongsTo('App\Review', 'review_id');
    }

    public function replies() {
        $replies = $this->hasMany('App\Comment','thread_id')->distinct();
        return $replies;
    }
}
