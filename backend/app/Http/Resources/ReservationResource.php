<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'date' => is_string($this->date)
                ? $this->date
                : $this->date->toDateString(),
            'guest_count' => $this->guest_count,
            'status' => $this->status,
            'time_slots' => TimeSlotResource::collection(
                $this->whenLoaded('timeSlots')
            ),
        ];
    }
}
