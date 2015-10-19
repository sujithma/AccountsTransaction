<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use App\Models\Category;
use Validator;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
   
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    private $errors;
    private $rules=array(
            'name' => 'Required',
            'parent_id' => 'Required',
            'transaction_type' => 'Required'
            );

    public function __construct()
    {
      //  $this->middleware('auth');
    }
    
    public function viewCategories(){
        $data = Category::all();
        return \Response::json($data);
    }
    public function addCategory(){
        $data = \Input::all();
        // $data['name'] = \Input::get('name');
        // $data['parent_id'] = \Input::get('parent_id');
        // $data['transaction_type'] = \Input::get('transaction_type');

        // $category = new \App\Models\Category;
        // $category->name = $data['name'];
        // $category->parent_id = $data['parent_id'];
        // $category->transaction_type = $data['transaction_type'];
        // $retData['status'] = $category->save() ? 200 : 500;

        return \Response::json($data);
    }

    protected function deleteCategory(){

    }
    protected function updateCategory(){

    }
}