<?php

namespace App\Http\Controllers;
use App\Group;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        /*$form = $request->session()->get('form_type');
         //$form = $request->session()->get('login_data');
      
dd($form);
        $code=$form->code;
        $group = Group::find($code);
        $group->user()->attach($group);*/
        return view('home');
    }
}
