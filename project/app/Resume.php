<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = ['title','subtitle','duration','description'];
    public $timestamps = false;
}
