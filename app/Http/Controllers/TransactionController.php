<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Validator;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
   
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
   

    public function __construct()
    {
       // $this->middleware('auth');
    }
    
    public function viewTransactions(){
        $data = Transaction::with('users','categories')->get();
        return \Response::json($data);
    }

    public function addTransaction(){
        $data['title'] = \Input::get('title');
        $data['description'] = \Input::get('description');
        $data['category_id'] = \Input::get('category_id');
        $data['transaction_type'] = \Input::get('transaction_type');
        $data['transaction_date'] = \Input::get('date');
        $date = \Carbon\Carbon::parse($data['transaction_date'])->format('Y-m-d');
        $data['user_id'] = \Auth::id();

        $transaction = new Transaction;
        $transaction->title = $data['title'];
        $transaction->description = $data['description'];
        $transaction->category_id = $data['category_id'];
        $transaction->user_id = $data['user_id'];
        $transaction->transaction_type = $data['transaction_type'];
        $transaction->transaction_date = $date;
        $retData['status'] = $transaction->save() ? 200 : 500;
        $id = $transaction->id;
        $retData['user'] = Transaction::with('users','categories')->find($id);

        return \Response::json($retData);
        
    }

    protected function updateTransaction(){

    }
    public function PermanentDeleteTransaction(){
        $id = \Input::get('id');        
        $transaction = Transaction::onlyTrashed()->where('id','=' ,$id)->first();
        $retData = $transaction->forceDelete() ? 200 : 500;
        return \Response::json($retData);
    }
    public function delete(){
        $id = \Input::get('id');
        $transaction = Transaction::find($id);
        $retData = $transaction->delete() ? 200 : 500; 
        return \Response::json($retData);
    }
    public function viewTrash(){
         $data = Transaction::with('users','categories')->onlyTrashed()->get();
        return \Response::json($data);
    }
    public function restoreTransaction(){
        $id = \Input::get('id');
        $category = Transaction::onlyTrashed()->where('id','=' ,$id)->get()->first();
        $retData = $category->restore() ? 200 : 500;
        return \Response::json($retData);
    }
    
    public function search() {
        $type = \Input::get('type');
        $userId = \Input::get('userId');
        $data = Transaction::with('users','categories');
        if($type){
            $data = $data->where('transaction_type', '=', $type);
        }
        if($userId){
            $data = $data->where('user_id', '=', $userId);
        }
        $data = $data->get();
        // $data['ty']=$type;
        // $data['us']=$userId;

        return \Response::json($data);


    }
}