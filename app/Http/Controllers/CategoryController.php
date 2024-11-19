<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    function index()
    {
        $categories = Category::paginate(5);
        return view('admin.store.categories.index', compact('categories'));
    }

    function create()
    {
        return view('admin.store.categories.create');
    }

    function store(Request $request)
    {
        Category::create($request->all());
        return redirect()->route('admin.store.categories.index')->with('success', 'Categoría creada exitosamente.');
    }

    function edit(Category $category): View
    {
        return view('admin.store.categories.update', compact('category'));
    }

    function update(Request $request, Category $category): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $category->update([
            'name' => $validatedData['name'],
        ]);
        return redirect()->route('admin.store.categories.index')->with('success', 'Categoría actualizada exitosamente.');
    }

    function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->route('admin.store.categories.index')->with('success', 'Categoría eliminada exitosamente.');
    }
}
