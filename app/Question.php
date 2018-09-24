<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //

    public function qcm(){

    	return $this->belongsTo('App\Qcm');
    }


   public function choix(){

        return $this->hasMany('App\Choix');
    }
}
