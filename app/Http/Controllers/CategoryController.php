<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // public function index()
    // {
    //     $categories = Category::all();
    //     return view('categories.index', compact('categories'));
    // }

    // public function create()
    // {
    //     return view('categories.create');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|max:100'
        ]);

        Category::create($request->all());
        return redirect()->back()->with('success', 'Category created successfully.');
    }

    // public function show(Category $category)
    // {
    //     return view('categories.show', compact('category'));
    // }

    // public function edit(Category $category)
    // {
    //     return view('categories.edit', compact('category'));
    // }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name' => 'required|max:100'
        ]);

        $category->update($request->all());
        return redirect()->back()->with('success', 'Category updated successfully.');

    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('success', 'Category deletes successfully.');
    }
}
