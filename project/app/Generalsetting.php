<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Generalsetting extends Model
{
    protected $fillable = ['logo', 'favicon', 'title', 'site', 'bgimg', 'about', 'street', 'phone', 'fax', 'email', 'footer', 'bg_link','bg_title','bg_text','np','fp','pb','sk','ss','loader_status','loader_image'];

    public $timestamps = false;
}
