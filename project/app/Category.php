<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['cat_name', 'cat_slug','photo'];
    public $timestamps = false;

    public function users()
    {
    	return $this->hasMany('App\User');
    }
}
