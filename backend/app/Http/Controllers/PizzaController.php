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

    public function store(Request $request)
    {
        abort(501, 'Not implemented yet');
    }

    public function show(Pizza $pizza)
    {
        return new PizzaResource($pizza->load('categories'));
    }

    public function update(Request $request, Pizza $pizza)
    {
        abort(501, 'Not implemented yet');
    }

    public function destroy(Pizza $pizza)
    {
        abort(501, 'Not implemented yet');
    }
}
