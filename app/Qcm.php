<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Qcm extends Model
{
    //
    use SoftDeletes;


    protected $dates = ['deleted_at'];


    public function user(){

    	return $this->belongsTo('App\User');
    }


    public function users(){

        return $this->belongsToMany('App\User')->withPivot('group_id', 'note');
    }

    public function questions(){

        return $this->hasMany('App\Question');
    }


     public function groups(){

        # code...
        return $this->belongsToMany('App\Group')->withPivot('date_debut', 'date_fin');
    }


    public function choix(){

        # code...
        return $this->belongsToMany('App\Choix')->withPivot('user_id');
    }



    

}
