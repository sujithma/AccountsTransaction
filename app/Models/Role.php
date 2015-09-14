<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Role extends Model{

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';

    public function users(){
    	return $this->hasMany('\App\Models\User','role_id');
    }

}