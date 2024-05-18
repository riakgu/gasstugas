<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = auth()->user()->categories;
        return CategoryResource::collection($categories);
    }

    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();
        $category = auth()->user()->categories()->create($validated);

        return new CategoryResource($category);
    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validated = $request->validated();
        $category->update($validated);

        return new CategoryResource($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json([
            'message' => 'Category deleted successfully',
        ]);
    }
}
