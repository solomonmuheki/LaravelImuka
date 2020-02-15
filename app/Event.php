<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $table = 'events';

    protected $fillable = ['id','title','event_type','venue','image','location','country', 'region','category'];
}
