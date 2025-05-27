<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'date_reservation',
        'date_request',
        'hour',
        'value',
        'customer_id',
        'state_id'
    ];

    protected $appends = [
        'customer',
        'reservationDetails'
        
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function reservationDetails()
    {
        return $this->hasMany(ReservationDetail::class);
    }

    public function getReservationDetailsAttribute()
    {
        return ReservationDetail::join('products', 'products.id', '=', 'reservation_details.product_id')->select('reservation_details.*', 'products.name AS product_name')->where('reservation_id', $this->id)->get();
    }

    public function getCustomerAttribute()
    {
        return Customer::where('id', $this->customer_id)->first();
    }
}	
