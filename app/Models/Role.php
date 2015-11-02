<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\softDeletes;
class Role extends Model{

	/**
     * The database table used by the model.
     *
     * @var string
     */
	use SoftDeletes;
    protected $table = 'roles';
    protected $dates = ['deleted_at'];
    public function users(){
    	return $this->hasMany('\App\Models\User','role_id');
    }

}