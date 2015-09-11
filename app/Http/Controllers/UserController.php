<?php

namespace App\Http\Controllers;

use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
   
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    protected function updateUser(){
        

    }
    protected function deleteUser(){

    }
}