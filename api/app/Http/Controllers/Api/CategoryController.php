<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController
{
    public function index()
    {
        $category = Category::all();
        return CategoryResource::collection($category);
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = Category::query()->create($request->validated());
        return new CategoryResource($category, 201);
    }

    public function update(StoreCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return new CategoryResource($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response(null, 204);
    }
}
