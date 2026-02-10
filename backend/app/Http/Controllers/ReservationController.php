<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Resources\ReservationResource;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return ReservationResource::collection(Reservation::with('timeSlots')->get());
    }

    public function store(Request $request)
    {
        abort(501, 'Not implemented yet');
    }

    public function show(Reservation $reservation)
    {
        return new ReservationResource($reservation->load('timeSlots'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        abort(501, 'Not implemented yet');
    }

    public function destroy(Reservation $reservation)
    {
        abort(501, 'Not implemented yet');
    }
}
