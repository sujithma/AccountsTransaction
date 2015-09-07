<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    protected function postLogin(array $data){
       {
        
        $rules = array(
            'email' => 'required|email',
            'password' => 'required|min:6',
         );
        $validator = Validator::make($data, $rules);
        if ($validator->fails()){
            // If validation falis redirect back to login.
               // return redirect()->intended('/login')->withErrors($validator);
            }
            else{

            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            // Authentication passed...
                 if(Auth::user()->status == '0')
                 {
                    if(Auth::user()->role_id == '2'){
                        //return redirect('/home');
                    }else{
                        return redirect()->intended('/admin');
                    }
                  }
                  else{

                     //return redirect('/logout');
                  }

            }
            else{
                //return redirect('/login');
            }
        }
        

    }
    

    }

    protected function postRegister(array $data){
        if($this->validator($data)){

            $user= new User;

            $user->name=$data['name'];
            $user->email=$data['email'];
            $user->password=$data['password'];
            $user->role_id='1';

            $user->save();

        }
        else{

        }

    }
    protected function plogin(){
        $data   =   [];

        $data['email'] = \Input::get('email');
        $data['us'] =   'hii';

        //$data = \App\Models\User::all();


        return \Response::json($data);
    }
     protected function login(){
        $data   =   [];

        $data = \App\Models\User::all();

        return \Response::json($data);
    }
}
