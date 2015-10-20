<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use App\Models\Category;
use Validator;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
   

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function viewCategories(){
        $data = Category::all();
        return \Response::json($data);
    }
    public function addCategory(){
        $data = \Input::all();
        // $data['name'] = \Input::get('name');
        $data['parent_id'] = ($data['parent_id'] == '') ? '' : $data['parent_id']; 
        $data['transaction_type'] = ($data['transaction_type'] == 'Cr') ? 1 : 0;

        $category = new Category;
        $category->name = $data['name'];
        $category->parent_id = $data['parent_id'];
        $category->transaction_type = $data['transaction_type'];
         $retData['status'] = $category->save() ? 200 : 500;

        return \Response::json($data);
    }

    public function deleteCategory(){

    }
    public function updateCategory(){

    }
}