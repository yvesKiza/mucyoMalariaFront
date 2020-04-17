<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function test(){
        return $this->hasMany('App\MalariaTest','patient_id');
    }
    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }
    public function getLastNameAttribute($value)
    {
        return ucfirst($value);
    }
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
    protected $dates = [
        'DOB',
    ];
    public function getSex(){
        if($this->gender==1)
             return "Male";
        else 
            return "Female";
       
    }
}
