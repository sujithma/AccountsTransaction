<?php

namespace App\Http\Controllers;

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
        $this->middleware('admin');
    }
    public function addRoles(){
        $name = \Input::get('name');
        $role = new \Role;
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
    
}