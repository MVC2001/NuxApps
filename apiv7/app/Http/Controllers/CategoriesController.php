<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
class CategoriesController extends Controller
{
     public function index()
    {
        try {
            $categories = Categories::all();
            return response()->json($categories, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
        }
    }


   public function store(Request $request)
{
    try {
        // Validate request data
                $validated = $request->validate([
            'category' => 'required|string|max:255',
            'supervisor' => 'required|string|max:255',
            'description' => 'required|string'
      ]);


        // Create a new task category
        $category = Categories::create($validated);

        // Return success response
        return response()->json(['message' => 'Task category created successfully', 'data' => $category], 201);
    } catch (\Exception $e) {
        // Return error response if validation fails or an exception occurs
        return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
    }
}

    public function show(Categories $category)
    {
        try {
            return response()->json($category, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request, Categories $category)
    {
        try {
            $validated = $request->validate([
            'category' => 'required|string|max:255',
            'supervisor' => 'required|string|max:255',
            'description' => 'required|string'
            ]);

            $category->update($validated);
            return response()->json(['message' => 'Task category updated successfully', 'data' => $category], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
        }
    }

    public function destroy(Categories $category)
    {
        try {
            $category->delete();
            return response()->json(['message' => 'Categories category deleted successfully', 'data' => $category], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
        }
    }
}
