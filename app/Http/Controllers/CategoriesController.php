<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    // Display all categories (READ)
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    // Show form to create a new category (CREATE)
    public function create()
    {
        return view('admin.categories.create');
    }

    // Store new category to database (CREATE)
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Prepare data for mass assignment (excluding _token)
        $data = $request->only(['name', 'description']);

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            $data['image'] = $imagePath;
        }

        // Create the category
        $category = Category::create($data);

        return redirect()->route('admin.category')
            ->with('success', 'Category created successfully!');
    }

    // Show form to edit an existing category (UPDATE)
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $category->name = $request->input('name');
        $category->description = $request->input('description');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            $category->image_url = $imagePath; // ✅ updated to match DB column
        }

        $category->save();

        return redirect()->route('admin.category')->with('success', 'Category updated successfully');
    }



    // Delete a category (DELETE)

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
//        dd($category);
        $category->delete();

        return redirect()->route('admin.category')->with('success', 'Category deleted successfully.');
    }
}
