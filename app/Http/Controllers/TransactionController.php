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
    public $timestamps = false;
    protected $table = "tasks";
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
    

    public function addTransaction(array $data){

    $valid = \Validator::make($data,$this->rules);
    if(!$valid->fails()) {

    }


    }

    public function updateTransaction(){

    }
    public function deleteTransaction(){

    }
}