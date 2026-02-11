<?php

namespace App\Http\Controllers;

use App\Models\TimeSlot;
use App\Http\Resources\TimeSlotResource;
use Illuminate\Http\Request;

class TimeSlotController extends Controller
{
    public function index()
    {
        return TimeSlotResource::collection(TimeSlot::where('is_active', true)->get());
    }

    public function show(TimeSlot $timeSlot)
    {
        return new TimeSlotResource($timeSlot);
    }
}
