<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function test(){
        return $this->hasMany('App\MalariaTest','user_id');
    }
    protected $dates = [
        'DOB',
    ];
    protected $fillable = [
        'name', 'email', 'password',
    ];
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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public function getSex(){
        if($this->gender==1)
             return "Male";
        else 
            return "Female";
       
    }
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
