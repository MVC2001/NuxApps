<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Tasks;

class TaskController extends Controller
{
    public function index()
    {
        try {
            $tasks = Tasks::all();
            return response()->json($tasks, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
        }
    }


   public function store(Request $request)
{
    try {
        // Validate request data
                $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'from' => 'required|string|max:255',
            'to' => 'required|string|max:255',
            'supervisor' => 'required|string|max:255',
            'description' => 'required|string'
      ]);


        // Create a new task item
        $task = Tasks::create($validated);

        // Return success response
        return response()->json(['message' => 'Task item created successfully', 'data' => $task], 201);
    } catch (\Exception $e) {
        // Return error response if validation fails or an exception occurs
        return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
    }
}

    public function show(Tasks $task)
    {
        try {
            return response()->json($task, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request, Tasks $task)
    {
        try {
            $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'from' => 'required|string|max:255',
            'to' => 'required|string|max:255',
            'supervisor' => 'required|string|max:255',
            'description' => 'required|string'
            ]);

            $task->update($validated);
            return response()->json(['message' => 'Task item updated successfully', 'data' => $task], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
        }
    }

    public function destroy(Tasks $task)
    {
        try {
            $task->delete();
            return response()->json(['message' => 'Task item deleted successfully', 'data' => $task], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
        }
    }
}
