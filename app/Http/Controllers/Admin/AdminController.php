<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Role;
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
        $role = new \App\Models\Role;
        $role->name = $name;
        $data['status'] = $role->save() ? 200 : 500;
        return \Response::json($data);

    }
    public function deleteRole(){
        $id = \Input::get('id');
        $role = \Role::find('id');
        $retData['status'] = $role->delete() ? 200 : 500;
        return \Response::json($retData);
    }
    public function viewRoles(){
        $data = \App\Models\Role::all();
        return \Response::json($data);
    }
    
}