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
        $exist = Category::withTrashed()->where('name','=',$data['name'])->get()->first();
        if($exist){
             $retData['data'] = $exist;
             $retData['status'] = 409;
        }else{
            $data['parent_id'] = ($data['parent_id'] == '') ? 0 : $data['parent_id']; 
            $data['transaction_type'] = ($data['transaction_type'] == 'Cr') ? 1 : 0;

            $category = new Category;
            $category->name = $data['name'];
            $category->parent_id = $data['parent_id'];
            $category->transaction_type = $data['transaction_type'];
            $retData['status'] = $category->save() ? 200 : 500;
            $retData['id'] = $category->id;
            $retData['parent_id'] = $category->parent_id;

        }

        
        return \Response::json($retData);
    }

    public function deleteCategory(){
        $id = \Input::all();
        $category = Category::find($id['id']);
        $retData = $category->delete() ? 200 : 500;
        return \Response::json($retData);
    }
    public function viewTrash(){
         $data = Category::onlyTrashed()->get();
        return \Response::json($data);
    }
    public function forceDeleteCategory(){
        $id = \Input::all();
        $category = Category::onlyTrashed()->where('id','=' ,$id['id'])->get()->first();
        $retData = $category->forceDelete() ? 200 : 500;
        return \Response::json($retData);
    }
     public function restoreCategory(){
        $id = \Input::all();
        $category = Category::onlyTrashed()->where('id','=' ,$id['id'])->get()->first();
        $retData = $category->restore() ? 200 : 500;
        return \Response::json($retData);
    }
    
    
}