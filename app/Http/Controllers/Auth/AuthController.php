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
    protected $redirectTo = '/';
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
    // protected function create(array $data)
    //     {
    //         return \User::create([
    //             'name' => $data['name'],
    //             'email' => $data['email'],
    //             'password' => bcrypt($data['password']),
    //         ]);
    //     }
    
    protected function postLogin(){

        $credentials = \Input::only('email', 'password');

        if (\Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'] ]))
        {
            if(\Auth::User()->role_id == '2'){
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
        // return redirect('/home');
       

    }

    protected function postRegister(){
        $data['name'] = \Input::get('name');
        $data['email'] = \Input::get('email');
        $data['password'] = \Input::get('password');
        $data['role_id'] = 1;
        
        $user= new \App\Models\User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->role_id = '2';
        $retData = $user->save() ? 200 : 500;
        return \Response::json($retData);
    }

    protected function authLogin(){
        
        $data['status'] = \Auth::user() ? 1 : 0;
        $data['user'] = \Auth::user();
        return \Response::json($data);
        //print_r(\Auth::user());
    }
     protected function login(){
        $data   =   [];
        $data = User::all();
        return \Response::json($data);
    }
    protected function getLogout(){
        $data['status'] =   \Auth::logout() ? 200 : 500;
        return \Response::json($data);
    }
}
