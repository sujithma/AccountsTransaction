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
    public function addRoles(){
        $name = \Input::get('role_name');
        $role = new Role;
        $role->name = $name;
        $data['status'] = $role->save() ? 200 : 500;
        return \Response::json($data);

    }
    public function deleteRole(){
        $id = \Input::get('id');
        $role = Role::find($id);
        $retData['status'] = $role->delete() ? 200 : 500;
        return \Response::json($retData);
    }
    public function editRole(){

        $role_id = \Input::get('id');
        $role_name = \Input::get('role_name');
        $role = Role::find( $role_id);
        $role->name = $role_name;
        $data['status'] = $role->save() ? 200 : 500;
        return \Response::json($data);

    }
    public function viewRoles(){
        $data = Role::all();
        return \Response::json($data);
    }
    public function findRole(){
        $id = \Input::get('id');
        $role = Role::find($id);
        return \Response::json($role);
    }
     public function viewUsers(){
        $data = User::where('id', '!=', \Auth::id())->get();
        return \Response::json($data);
    }
    public function addUsers(){
        $data = \Input::all();
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password =  bcrypt($data['password']);
        $user->role_id = $data['role'];
        $data['status'] = $user->save() ? 200 : 500;
        $data['userid'] = $user->id;
        return \Response::json($data);
    }
     public function deleteUser(){
        $id = \Input::get('id');
        $user = User::find($id);
        $retData['status'] = $user->delete() ? 200 : 500;
        return \Response::json($retData);
    }
     

    
}