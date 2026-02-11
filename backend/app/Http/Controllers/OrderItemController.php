<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderItemResource;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index()
    {
        return OrderItemResource::collection(OrderItem::with('order')->get());
    }

    public function show(OrderItem $orderItem)
    {
        return new OrderItemResource($orderItem->load('order'));
    }
}
