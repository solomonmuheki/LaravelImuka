<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $table = 'events';

    protected $fillable = ['id','title','event_type','venue','added_by','image','time_of_event','link','verified', 'description','location', 'user_type','country', 'region','category','price','contact','session_objectives','date_from','date_to','time_from','time_to'];
}
