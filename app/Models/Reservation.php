<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'date_reservation',
        'hour',
        'value',
        'customer_id',
        'state_id'
    ];
}	
