<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:1', 'max:50'],
            'date' => ['sometimes', 'date', 'after_or_equal:today'],
            'time_slot_id' => ['sometimes', 'integer', 'exists:time_slots,id'],
            'guest_count' => ['sometimes', 'integer', 'min:1', 'max:10'],
            'status' => ['sometimes', 'in:pending,confirmed,cancelled'],
        ];
    }
}
