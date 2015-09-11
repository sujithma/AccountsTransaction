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
    private $errors;
    private $rules=array(
            'title' => 'Required',
            'description' => 'Required',
            'category_id' => 'Required',
            'status' => 'Required',
            'transaction_date' => 'Required'
            );

    public function __construct()
    {
        $this->middleware('auth');
    }
    

    protected function addTransaction(){

        $data['title'] = \Input::get('title');
        $data['description'] = \Input::get('description');
        $data['category_id'] = \Input::get('category_id');
        $data['status'] = \Input::get('status');
        $data['transaction_date'] = \Input::get('transaction_date');

        $transaction = new \Transaction;
        $transaction->title = $data['title'];
        $transaction->description = $data['description'];
        $transaction->category_id = $data['category_id'];
        $transaction->status = $data['status'];
        $transaction->transaction_date = $data['transaction_date'];
        $retData['status'] = $transaction->save() ? 200 : 500;

        return \Response::json($retData);
        
    }

    protected function updateTransaction(){

    }
    protected function deleteTransaction(){

        $id = \Input::get('id');
        $transaction = \Transaction::find($id);
        $retData['status'] = $transaction->delete() ? 200 : 500;

    }
}