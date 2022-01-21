<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    protected $guard = 'doctor';
    protected $table = 'doctors';

    protected $fillable = ['name','doctor_name', 'qualification', 'email', 'department','address',  'phone', 'photo','about','password','created_at', 'updated_at', 'remember_token'];

    protected $hidden = [
        'password'
    ];  

    protected $remember_token = false; 

    public function department()
   {
   	return $this->belongsTo('App\Department');
   }
}
