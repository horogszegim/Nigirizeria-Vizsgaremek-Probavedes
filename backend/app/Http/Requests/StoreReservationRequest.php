<?php

namespace App\Http\Requests;

use App\Models\TimeSlot;
use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:1', 'max:50'],
            'date' => ['required', 'date', 'after_or_equal:today'],
            'guest_count' => ['required', 'integer', 'min:1', 'max:10'],
            'status' => ['sometimes', 'in:pending,confirmed,cancelled'],

            'time_slot_ids' => ['required', 'array', 'min:1'],
            'time_slot_ids.*' => ['required', 'integer', 'distinct', 'exists:time_slots,id'],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $ids = $this->input('time_slot_ids');

            if (!is_array($ids) || count($ids) < 1) {
                return;
            }

            $timeSlots = TimeSlot::query()
                ->whereIn('id', $ids)
                ->orderBy('start_time')
                ->get(['id', 'start_time', 'end_time']);

            if ($timeSlots->count() !== count(array_unique($ids))) {
                $validator->errors()->add('time_slot_ids', 'Érvénytelen time slot lista.');
                return;
            }

            for ($i = 1; $i < $timeSlots->count(); $i++) {
                $prev = $timeSlots[$i - 1];
                $curr = $timeSlots[$i];

                if ($prev->end_time !== $curr->start_time) {
                    $validator->errors()->add(
                        'time_slot_ids',
                        'Csak egymás melletti time slotokat lehet foglalni.'
                    );
                    return;
                }
            }
        });
    }
}
