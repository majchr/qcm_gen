<?php

namespace App\Http\Controllers\Auth;



use App\User;
use App\Group;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    

    use RegistersUsers {
        register as traitRegister ;
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
     
    protected function validator(array $data)
    {
        if($data['type']=='Teacher'){
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
           // ->where(required_if:type,Student),
            //'code'=>'required_if:type,Student',
            //'code'=>'required_unless:type,Teacher',

           
                # code...
                //'code' => 'exists:groups',
           // 'code' => 'exists:groups',
            

           
            

        ]);}
    else if($data['type']=='Student'){
    return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
           // ->where(required_if:type,Student),
            //'code'=>'required_if:type,Student',
            'code'=>'required|exists:groups',
            //'code'=>'exists:groups',
           
                # code...
                //'code' => 'exists:groups',
           // 'code' => 'exists:groups',
            

           
            

        ]);}
    }



     protected function validator1(array $data)
    {
        return Validator::make($data, [
            'code'=>'exists:groups',

                # code...
                //'code' => 'exists:groups',
           // 'code' => 'exists:groups',
            

           
            

        ]);
    }


   

    /**
     * Create a new user instance after a valid registration.
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //dd($data['type'])
        
       
            # code...
        
//session(['login_data' => $request->all() ]);
             $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => $data['type'],
           
        ]);
    if($data['type']=='Student'){
        $code=$data['code'];
        $group = Group::where("code",$code)->first();
        //dd($group);
        $group->users()->attach($user);
        $group->code = $group->getGenerateRandomString(10);
       // dd($group->code);
        $group->save();
            
        }
       return $user;
    }


   

   /* public function register(Request $request)
    {
        $request->session()->flash('form_type', 'register');
        return $this->traitRegister($request);
    }*/



   
}
