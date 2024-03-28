<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{


    public function __construct()
{
    $this->middleware('auth:sanctum')->except(['register', 'login']);
}


public function register(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ]);

    $validatedData['password'] = bcrypt($validatedData['password']);

    $user = User::create($validatedData);

    if ($user) {
        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    } else {
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
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $user = $request->user();
    $token = $user->createToken('authToken')->plainTextToken;

    return response()->json(['user' => $user, 'token' => $token]);
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

    $user = $request->user();

    // Check if the current password matches the hashed password
    if (!password_verify($request->current_password, $user->password)) {
        return response()->json(['message' => 'Current password is incorrect'], 401);
    }

    // Update the password with the new hashed password
    $user->update([
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

    $user = $request->user();

    return response()->json(['email' => $user->email]);
}


}
