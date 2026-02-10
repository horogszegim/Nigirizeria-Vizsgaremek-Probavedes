<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        return OrderResource::collection(Order::with('orderItems.pizza')->get());
    }

    public function store(StoreOrderRequest $request)
    {
        $data = $request->validated();

        $items = $data['items'] ?? [];
        unset($data['items']);

        $totalPrice = 0;

        foreach ($items as $item) {
            $pizza = \App\Models\Pizza::findOrFail($item['pizza_id']);
            $totalPrice += $pizza->price * $item['quantity'];
        }

        $data['total_price'] = $totalPrice;

        $order = Order::create($data);

        if (!empty($items)) {
            $order->orderItems()->createMany($items);
        }

        return new OrderResource($order->load('orderItems.pizza'));
    }


    public function show(Order $order)
    {
        return new OrderResource($order->load('orderItems.pizza'));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $data = $request->validated();

        $items = $data['items'] ?? null;
        unset($data['items']);

        $order->update($data);

        if ($items !== null) {
            $order->orderItems()->delete();
            $order->orderItems()->createMany($items);
        }

        return new OrderResource($order->load('orderItems.pizza'));
    }

    public function destroy(Order $order)
    {
        $order->orderItems()->delete();

        if ($order->delete()) {
            return response()->noContent(204);
        }

        abort(500);
    }
}
