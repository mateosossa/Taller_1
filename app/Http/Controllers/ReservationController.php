<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Service;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('reservations.index', compact('services'));
    }

    public function create($service_id)
{
    $service = Service::findOrFail($service_id);
    return view('reservations.create', compact('service'));
}


    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'service_id' => 'required|exists:services,id',
            'reservation_time' => 'required|date|after:now',
        ]);

        Reservation::create($request->all());

        return redirect()->route('reservations.index')->with('success', 'Reservation made successfully');
    }

    public function show($id)
    {
        $reservation = Reservation::with('service')->findOrFail($id);
        return view('reservations.show', compact('reservation'));
    }
}
