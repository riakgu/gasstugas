<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = auth()->user()->categories;

        return view('categories.index', [
            'title' => 'Categories',
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('categories.create', [
            'title' => 'Create Category',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $category = auth()->user()->categories()->create($validated);

        return redirect('/categories')->with('success', 'Category has been created!');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('categories.edit', [
            'title' => 'Edit Category',
            'category' => $category,
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $category->update($validated);

        return redirect('/categories')->with('success', 'Category has been updated!');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/categories')->with('success', 'Category has been deleted!');
    }
}
