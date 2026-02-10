<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:1', 'max:50'],
            'email' => ['required', 'email'],
            'address' => ['required', 'string', 'min:5', 'max:255'],

            'items' => ['required', 'array', 'min:1'],
            'items.*.pizza_id' => ['required', 'integer', 'exists:pizzas,id'],
            'items.*.quantity' => ['required', 'integer', 'min:1', 'max:20'],

            'status' => ['required', 'in:pending,paid,cancelled,completed'],
        ];
    }
}
