<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class Transaction extends Model{

	/**
     * The database table used by the model.
     *
     * @var string
     */use SoftDeletes;
    protected $table = 'transactions'; protected $dates = ['deleted_at'];

     public function users(){
        return $this->belongsTo('\App\Models\User','user_id');
    }
     public function categories(){
        return $this->belongsTo('\App\Models\Category','category_id');
    }

}