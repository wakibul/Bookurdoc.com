<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Region extends Model
{
    //
    use SoftDeletes;
    protected $guarded = ['id','token'];

    public function clinics(){
    	return $this->hasMany('App\Models\Clinic');
    }
}
