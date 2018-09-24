<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //

    use SoftDeletes;


    protected $dates = ['deleted_at'];

    function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

public function getGenerateRandomString(){

	return $this->generateRandomString();
}

public function user(){
    	return $this->belongsTo('App\User');
   
}

public function users(){
    
        return $this->belongsToMany('App\User')->withPivot('allow');
}
public function qcms(){
    
        return $this->belongsToMany('App\Qcm')->withPivot('date_debut', 'date_fin');
}

/*public function qcms(){

        # code...
        return $this->belongsToMany('App\Qcm')->withPivot('allow');
    }*/
}
