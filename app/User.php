<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


Use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type','admin','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



   
    public function qcms(){

        return $this->hasMany('App\Qcm');
    }

    public function qcmsstd(){

        return $this->belongsToMany('App\Qcm')->withPivot('group_id', 'note');
    }

    public function groups(){
        
            # code...
        return $this->hasMany('App\Group');
    }


    public function groupsstd(){

        # code...
        return $this->belongsToMany('App\Group')->withPivot('allow');
    }


    

   
        
}

