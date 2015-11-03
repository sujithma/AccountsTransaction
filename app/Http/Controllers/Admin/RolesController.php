<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Role;
use App\Models\Category;
use Validator;
use App\Http\Controllers\Controller;

class RolesController extends Controller
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
        $name = \Input::get('name');
        $role = new Role;
        $role->name = $name;
        $data['status'] = $role->save() ? 200 : 500;
        $data['role'] = $role->id;
        $data['created_at']=$role->created_at;
        return \Response::json($data);
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

    public function deleteRole(){
        $id = \Input::get('id');
        $role = Role::find($id);
        $retData['status'] = $role->delete() ? 200 : 500;
        return \Response::json($retData);
    }
    public function viewTrash(){
         $data = Role::onlyTrashed()->get();
        return \Response::json($data);
    }

    public function restoreRole(){
        $id = \Input::get('id');
        $role = Role::onlyTrashed()->where('id','=' ,$id)->first();
        $retData = $role->restore() ? 200 : 500;
        return \Response::json($retData);
    }
    public function PermanentDeleteRole(){
        $id = \Input::get('id');
         $role = Role::onlyTrashed()->where('id','=', $id)->first();
         $retData = $role->forceDelete() ? 200 : 500; 
        return \Response::json($role);
    }

    
}