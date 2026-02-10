<?php

namespace App\Http\Controllers;

use App\Models\TimeSlot;
use App\Http\Resources\TimeSlotResource;
use Illuminate\Http\Request;

class TimeSlotController extends Controller
{
    public function index()
    {
        return TimeSlotResource::collection(
            TimeSlot::where('is_active', true)->get()
        );
    }

    public function store(Request $request)
    {
        abort(501, 'Not implemented yet');
    }

    public function show(TimeSlot $timeSlot)
    {
        return new TimeSlotResource($timeSlot);
    }

    public function update(Request $request, TimeSlot $timeSlot)
    {
        abort(501, 'Not implemented yet');
    }

    public function destroy(TimeSlot $timeSlot)
    {
        abort(501, 'Not implemented yet');
    }
}
