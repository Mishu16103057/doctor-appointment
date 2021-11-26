<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    protected $fillable = ['title','description','photo'];
    public $timestamps = false;
}
