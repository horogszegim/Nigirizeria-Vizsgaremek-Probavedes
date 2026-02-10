<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::with('pizzas')->get());
    }

    public function store(Request $request)
    {
        abort(501, 'Not implemented yet');
    }

    public function show(Category $category)
    {
        return new CategoryResource($category->load('pizzas'));
    }

    public function update(Request $request, Category $category)
    {
        abort(501, 'Not implemented yet');
    }

    public function destroy(Category $category)
    {
        abort(501, 'Not implemented yet');
    }
}
