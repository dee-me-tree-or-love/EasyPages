<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Profile;
use App\Company;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'type',
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function getprofile() {
        $profile = Profile::where('user_id', $this->id)->first();
        return $profile;
    }
    
    public function getcompany() {
        $company = Company::where('user_id', $this->id)->first();
        return $company;
    }
    
    public function getsayan() {
        $sayan = [];
        if($this->type == 'i')
        {
            $sayan = Profile::where('user_id', $this->id)->first();
        }
        else
        {
            $sayan = Company::where('user_id', $this->id)->first();
        }
        return $sayan;
    }
}
