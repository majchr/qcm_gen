<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    //
    public function __construct(){

        $this->middleware('auth');
    }


    public function index($id){

    	$user = User::find($id);
    	return view('profiles.profile', ['user' => $user]);
    }

    public function update_avatar(Request $request, $id){
 
       
        $user = User::find($id);

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

 
        $request->avatar->storeAs('avatars',$avatarName);
 
        $user->avatar = $avatarName;
        $user->save();
 
        return back()
            ->with('success','You have successfully upload image.');
 
    }
}
