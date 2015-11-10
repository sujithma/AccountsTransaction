<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Role;
use App\Models\Category;
use Validator;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
   
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    private $errors;
    public function __construct()
    {
        //$this->middleware('admin');
    }

    public function viewUsers(){
        $data = User::with('roles')->where('id', '!=', \Auth::id())->get();
        return \Response::json($data);
    }
    public function addUsers(){
        $data = \Input::all();
        $userEmail = User::where('email','=',$data['email'])->get()->first();

        if($userEmail){
            return \Response::json('alreday exist');
        }else{
            $user = new User;
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password =  bcrypt($data['password']);
            $user->role_id = $data['role_id'];
            $user->status = 1;
            $data['status'] = $user->save() ? 200 : 500;
            $data['userid'] = $user->id;
            return \Response::json($data);
        }
         
    }
    public function editUser() {
        $data = \Input::all();
        $id = $data['id'];
        $userEmail = User::where('id', '!=', $id)
                            ->where('email','=',$data['email'])
                            ->get()->first();
        if($userEmail){
            return \Response::json('alreday exist');
        }else{
            
            $user = User::find($id);
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->role_id = $data['role_id'];
            $data['status'] = $user->save() ? 200 : 500;
            return \Response::json($data);
        }
    }
    public function deleteUser(){
        $id = \Input::get('id');
        $user = User::find($id);
        $retData['status'] = $user->delete() ? 200 : 500;
        return \Response::json($retData);
    }
    public function viewTrash(){
         $data = User::with('roles')->onlyTrashed()->get();
        return \Response::json($data);
    }
    public function restoreUser(){
        $data = [];
        $id = \Input::get('id');
        $user = User::onlyTrashed()->where('id','=' ,$id)->get()->first();
        $data['retData'] = $user->restore() ? 200 : 500;
        $data['user'] = $user;
        return \Response::json($data);
    }
    public function changeStatus() {
        $id = \Input::get('id');
        $user = User::find($id);
        $status=$user->status;        
        $user->status = $user->status==0 ? 1 : 0;
        $data['status'] = $user->save() ? 200 : 500;
        return \Response::json($data);
    }

    
}