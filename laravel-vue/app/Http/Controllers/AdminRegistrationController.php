<?php

namespace App\Http\Controllers;

use App\Models\User; // Import modelu User
use Illuminate\Http\Request; // Import Request triedy pre získanie údajov z požiadaviek
use Illuminate\Support\Facades\Hash; // Import Hash triedy pre hashovanie hesiel
use Illuminate\Support\Facades\Validator; // Import Validator triedy pre validáciu vstupov
use Illuminate\Support\Facades\Log; // Import Log triedy pre zapisovanie logov

class AdminRegistrationController extends Controller
{
    public function register(Request $request)
    {
        // Log the request data
        Log::info('Request received to register admin', ['request' => $request->all()]);

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Return validation errors if any
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create a new admin user
        $admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => true,
        ]);

        // Log success message
        Log::info('Admin registered successfully', ['admin' => $admin]);

        // Return success response
        return response()->json(['message' => 'Admin registered successfully!', 'admin' => $admin], 201);
    }
}




