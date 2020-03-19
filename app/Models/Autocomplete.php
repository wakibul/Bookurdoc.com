<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autocomplete extends Model
{
    //
    public function doctor(){
        return $this->belongsTo('App\Models\ApiDoctor','doctor_id','id');
    }

    public function DoctorClinic(){
        return $this->hasMany('App\Models\DoctorClinic','doctor_id','doctor_id');
    }

}
