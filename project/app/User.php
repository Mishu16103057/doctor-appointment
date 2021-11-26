<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $guard = 'user';
    protected $table = 'user_profiles';

    protected $fillable = ['name', 'gender', 'age', 'profile_photo', 'my_info', 'phone', 'fax', 'email', 'password', 'country', 'address', 'city', 'zip', 'created_at', 'updated_at', 'remember_token', 'status'];

    protected $hidden = [
        'password'
    ];  

    protected $remember_token = false;  

//
//    public function category()
//    {
//    	return $this->belongsTo('App\Category');
//    }
}
