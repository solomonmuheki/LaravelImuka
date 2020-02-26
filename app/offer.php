<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class offer extends Model
{
    //
    protected $table = 'offers';

    protected $fillable = ['user_id','deal_id', 'offer_amount','status'];
}
