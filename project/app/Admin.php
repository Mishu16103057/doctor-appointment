<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $guard = 'admin';

    protected $fillable = [
        'name', 'username', 'email', 'phone', 'password', 'role', 'photo', 'created_at', 'updated_at', 'remember_token','fname','fimg','title','description','link','fimg','simg','vidimg','vid','st','pname','prole','pdesc','pgender','planguage','presidency','paddress','pfax','pfone','pmail','psite','pareas','pimg','bimg'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];



}
