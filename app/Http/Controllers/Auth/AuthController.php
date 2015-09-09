<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

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
    protected $redirectTo = '';
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['getLogout', 'authLogin']]);
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
            return \User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);
        }
    
    protected function postLogin(){

        $credentials = \Input::only('email', 'password');

        if (\Auth::attempt($credentials))
        {
            if(\Auth::User()->role_id = '2'){
                $returnData['status']="200";
                $returnData['role']='admin';
                $returnData['id']=\Auth::User()->id;

            }else{
                $returnData['status']="Success";
                $returnData['role']='user'; 
                $returnData['id']=\Auth::User()->id;
            }
        }
        else{
             $returnData['status']="401";

        }
        return \Response::json($returnData);
       

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

    protected function authLogin(){
        
        $data['status'] = \Auth::user() ? 1 : 0;
        return \Response::json($data);
        //print_r(\Auth::user());
    }
     protected function login(){
        $data   =   [];
        $data = User::all();
        return \Response::json($data);
    }
}
