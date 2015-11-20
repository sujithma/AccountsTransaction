<?php

namespace App\Http\Controllers\Admin;

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
        $data = Category::with('subcategories')->get();
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


            $category = new Category;
            $category->name = $data['name'];
            $category->parent_id = $data['parent_id'];
            $retData['status'] = $category->save() ? 200 : 500;
            $id = $category->id;
            $retData['category'] = Category::with('subcategories')->find($id);
        }
        return \Response::json($retData);
    }

    public function editCategory(){
        $data = \Input::all();
        $id = $data['id'];
        $name = $data['name'];
        $exist = Category::withTrashed()->where('id', '!=', $id)
                            ->where('name','=',$name)
                            ->get()->first();
        if($exist){
             $retData['data'] = $exist;
             $retData['status'] = 409;
        }else{
            $category = Category::find($id);
            $category->name = $name;
            $category->parent_id = $data['parent_id'];
            $retData['status'] = $category->save() ? 200 : 500;

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
        $data = Category::with('subcategories')->onlyTrashed()->get();
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