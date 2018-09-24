<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choix extends Model
{
    //
    
     protected $table = 'choices';




     public function question(){

    	return $this->belongsTo('App\Question');
    }

    public function qcms(){

    	return $this->belongsToMany('App\Qcm')->withPivot('user_id');
    }
}
