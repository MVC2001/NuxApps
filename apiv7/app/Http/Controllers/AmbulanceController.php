<?php

namespace App\Http\Controllers;

use App\Models\Ambulance;
use Illuminate\Http\Request;

class AmbulanceController extends Controller
{
    public function index()
    {
        return Ambulance::orderBy('id', 'desc')->get();
    }

    public function searchBroute(Request $request)
    {
        // Retrieve search term from the request
        $searchTerm = $request->query('search');

        // Query ambulances based on the search term
        $ambulances = Ambulance::when($searchTerm, function ($query) use ($searchTerm) {
            return $query->where('route', 'like', '%' . $searchTerm . '%');
        })->orderBy('id', 'desc')->get();

        return $ambulances;
    }


    public function show($id)
    {
        return Ambulance::findOrFail($id);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'category' => 'required',
                'brand' => 'required',
                'amblnc_number' => 'required',
                'route' => 'required',
                'price' => 'required|numeric',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $data['image'] = $imageName;
            }

            $ambulance = Ambulance::create($data);

            return response()->json(['message' => 'New Item added successfully', 'ambulance' => $ambulance], 200);

        } catch (\Exception $e) {
            // Handle exceptions here
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $ambulance = Ambulance::findOrFail($id);

        $data = $request->validate([
            'category' => 'required',
            'brand' => 'required',
            'amblnc_number' => 'required',
            'route' => 'required',
            'price' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;

            if ($ambulance->image) {
                unlink(public_path('images/' . $ambulance->image));
            }
        }

        $ambulance->update($data);

        return $ambulance;
    }

    public function destroy($id)
    {
        $ambulance = Ambulance::findOrFail($id);

        if ($ambulance->image) {
            unlink(public_path('images/' . $ambulance->image));
        }

        $ambulance->delete();

        return response()->json(['message' => 'Record deleted successfully'], 200);
    }
}
