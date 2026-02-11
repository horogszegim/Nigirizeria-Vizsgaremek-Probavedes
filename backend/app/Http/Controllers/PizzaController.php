<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Http\Resources\PizzaResource;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function index()
    {
        return PizzaResource::collection(Pizza::with('categories')->get());
    }

    public function show(Pizza $pizza)
    {
        return new PizzaResource($pizza->load('categories'));
    }
}
