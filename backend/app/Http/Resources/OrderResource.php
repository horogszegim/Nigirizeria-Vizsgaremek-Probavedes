<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'total_price' => $this->total_price,
            'status' => $this->status,
            'order_items' => OrderItemResource::collection(
                $this->whenLoaded('orderItems')
            ),
            'created_at' => $this->created_at,
        ];
    }
}
