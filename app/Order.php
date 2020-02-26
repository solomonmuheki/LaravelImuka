<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function tickets(){
        return $this->belongsToMany('App\Ticket')->withPivot('numberOfTickets');
    }

    public function transaction(){
        return $this->hasOne('App\Transaction');
    }
}
