<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class Category extends Model{

	/**
     * The database table used by the model.
     *
     * @var string
     */
	
	protected $dates = ['deleted_at'];
    protected $table = 'categories';

	  public function transactions(){
	        return $this->hasMany('\App\Models\transaction','category_id');
	    }
}