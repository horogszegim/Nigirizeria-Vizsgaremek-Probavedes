<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Http\Resources\ReservationResource;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index()
    {
        return ReservationResource::collection(Reservation::with('timeSlots')->get());
    }

    public function store(StoreReservationRequest $request)
    {
        $data = $request->validated();

        $timeSlotIds = $data['time_slot_ids'];
        unset($data['time_slot_ids']);

        $reservation = Reservation::create($data);
        $reservation->timeSlots()->sync($timeSlotIds);

        return new ReservationResource($reservation->load('timeSlots'));
    }

    public function show(Reservation $reservation)
    {
        return new ReservationResource($reservation->load('timeSlots'));
    }

    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        $data = $request->validated();

        $timeSlotIds = $data['time_slot_ids'] ?? null;
        unset($data['time_slot_ids']);

        $reservation->update($data);

        if ($timeSlotIds !== null) {
            $reservation->timeSlots()->sync($timeSlotIds);
        }

        return new ReservationResource($reservation->load('timeSlots'));
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->timeSlots()->detach();

        if ($reservation->delete()) {
            return response()->noContent(204);
        }

        abort(500);
    }
}
