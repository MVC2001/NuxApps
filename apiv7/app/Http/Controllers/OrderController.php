<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\User;

class OrderController extends Controller
{

public function __construct()
    {
        $this->middleware('auth:sanctum');
    }


   public function index()
{
    try {
        $orders = Orders::whereNull('confirm')->orderBy('id', 'desc')->get();
        return response()->json($orders, 200);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Internal Server Error'], 500);
    }
}


    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
    'amblnc_number' => 'required|string|max:100',
    'brand' => 'required|string|max:100',
    'route' => 'required|string|max:100',
    'price' => 'required|string|max:100',
    'clientName' => 'required|string|max:100',
    'address' => 'required|string|max:100',
    'phone' => 'required|string|max:50',
    'accountNo' => 'required|string|max:100',
    'payMethod' => 'required|string|max:100',
    'amount' => 'required|string|max:100',
    'confirm' => 'nullable|string|max:50' // Allow 'confirm' to be null or empty
]);


            $order = Orders::create($validated);
            return response()->json(['message' => 'Order item created successfully', 'data' => $order], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function show($id)
    {
        try {
            $order = Orders::findOrFail($id);
            return response()->json($order, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'amblnc_number' => 'sometimes|required|string|max:100',
                'brand' => 'sometimes|required|string|max:100',
                'route' => 'sometimes|required|string|max:100',
                'price' => 'sometimes|required|string|max:100',
                'clientName' => 'sometimes|required|string|max:100',
                'address' => 'sometimes|required|string|max:100',
                'phone' => 'sometimes|required|string|max:50',
                'accountNo' => 'sometimes|required|string|max:100',
                'payMethod' => 'sometimes|required|string|max:100',
                'amount' => 'sometimes|required|string|max:100',
                'confirm' => 'nullable|string|max:50' // Allow 'confirm' to be null
            ]);

            $order = Orders::findOrFail($id);
            $order->update($validated);

            return response()->json(['message' => 'Order item updated successfully', 'data' => $order], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $order = Orders::findOrFail($id);
            $order->delete();
            return response()->json(['message' => 'Order item deleted successfully', 'data' => $order], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }


    public function confirmedOrders()
{
    try {
        $confirmedOrders = Orders::where('confirm', 'confirmed')->orderBy('id', 'desc')->get();
        return response()->json($confirmedOrders, 200);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Internal Server Error'], 500);
    }
}

//get orderd for logged driver
public function driverOrders(Request $request)
{
    try {
        // Get the logged-in user's route
        $userRoute = $request->user()->route;

        // Retrieve orders with the same route as the user's route and confirm status as "confirmed"
        $orders = Orders::where('route', $userRoute)
                        ->where('confirm', 'confirmed')
                        ->orderBy('id', 'desc')
                        ->get();

        return response()->json($orders, 200);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Internal Server Error'], 500);
    }
}

}
