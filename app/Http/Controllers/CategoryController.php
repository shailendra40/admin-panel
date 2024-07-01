<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    public function __construct()
    {
        // Apply middleware to all methods except 'index' and 'show'
        $this->middleware(['permission:create_categories'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:edit_categories'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:delete_categories'], ['only' => ['destroy']]);
    }

    public function index()
    {
        Gate::authorize('view-category-list');

        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        // The permission middleware will take care of the authorization check
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        // The permission middleware will take care of the authorization check
        $validatedData = $request->validate([
            'title' => 'required|max:255',
        ]);

        $category = new Category();
        $category->title = $validatedData['title'];
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Category added successfully.');
    }

    public function show(Category $category)
    {
        $this->authorize('view', $category);

        // Show the category if needed
    }

    public function edit(Category $category)
    {
        // The permission middleware will take care of the authorization check
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        // The permission middleware will take care of the authorization check
        $validatedData = $request->validate([
            'title' => 'required|max:255',
        ]);

        $category->title = $validatedData['title'];
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        // The permission middleware will take care of the authorization check
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
