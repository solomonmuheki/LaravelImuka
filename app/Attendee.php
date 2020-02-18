<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    //
    protected $table = 'attendees';

    protected $fillable = ['user_id', 'event_id'];
}
