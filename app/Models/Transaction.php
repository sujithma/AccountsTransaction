<?php

namespace App\Models\Role;


use Illuminate\Database\Eloquent\Model;
class Transaction extends Model{

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'transactions';

     public function users(){
        return $this->belongsTo('\App\Models\User','user_id');
    }
     public function categories(){
        return $this->hasMAny('\App\Models\Category','category_id');
    }

}