<?php

namespace App\Http\Controllers;

use App\Models\Drivers; // Change the model import to Drivers
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriversController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['register', 'login']);
    }

   public function register(Request $request)
{
    try {
        $validatedData = $request->validate([
            'fullName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:drivers',
            'password' => 'required|string|min:8',
            'nida' => 'required|string|max:255',
            'tin' => 'required|string|max:255',
            'license' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'route' => 'required|string|max:255',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $driver = Drivers::create($validatedData);

        return response()->json(['message' => ' New Driver registered successfully', 'driver' => $driver], 201);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Internal server error'], 500);
    }
}


   public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string|min:8',
    ]);

    if (!Auth::attempt($credentials)) {
        \Log::debug('Input credentials: ' . json_encode($credentials));
        \Log::error('Authentication failed for email: ' . $credentials['email']);
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $driver = Auth::user();
    $token = $driver->createToken('authToken')->plainTextToken;

    return response()->json(['driver' => $driver, 'token' => $token]);
}


    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logged out']);
    }

    public function updatePassword(Request $request)
    {
        // Ensure the user is authenticated
        if (!$request->user()) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8',
        ]);

        $driver = $request->user();

        // Check if the current password matches the hashed password
        if (!password_verify($request->current_password, $driver->password)) {
            return response()->json(['message' => 'Current password is incorrect'], 401);
        }

        // Update the password with the new hashed password
        $driver->update([
            'password' => bcrypt($request->new_password),
        ]);

        return response()->json(['message' => 'Password updated successfully'], 200);
    }

    public function getLoggedUserName(Request $request)
    {
        // Ensure the user is authenticated
        if (!$request->user()) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $driver = $request->user();

        return response()->json(['email' => $driver->email]);
    }
}
