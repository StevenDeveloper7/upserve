<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\ReservationDetail;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $reservations = Reservation::all();

        $products = Product::select('products.id AS id', 'products.name AS description', 'products.cost AS value')->get();

        return Inertia::render('Reservation/AdminReservation', compact('products', 'reservations'));
    }

    public function store(Request $request)
    {

        $order = $request->order;

        // Store customer
        $customer = Customer::create([
            'name'          =>          $request->name,
            'last_name'     =>          $request->last_name,
            'phone'         =>          $request->phone,
            'email'         =>          $request->email
        ]);

        // Store reservation 		
        $dateToday = date('Y-m-d');

        $reservation = Reservation::create([
            'date_request'          =>          $dateToday,
            'date_reservation'      =>          $request->date_reservation,
            'hour'                  =>          $request->hour,
            'value'                 =>          $request->totalValue,
            'customer_id'           =>          $customer->id,
            'state_id'              =>          1
        ]);

        // Store reservation details  	
        for ($arrayPosition=0; $arrayPosition < count($order); $arrayPosition++) { 
            
            ReservationDetail::create([
                'reservation_id'        =>          $reservation->id,
                'product_id'            =>          $order[$arrayPosition]['id'],
                'quantity'              =>          $order[$arrayPosition]['quantity'],
                'cost'                  =>          $order[$arrayPosition]['cost']
            ]);
        }

    }
}
