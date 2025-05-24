<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservationDetail extends Model
{ 
    protected $fillable = [
        'reservation_id',
        'product_id',
        'quantity',
        'cost'
    ];
}
