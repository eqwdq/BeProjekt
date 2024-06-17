<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;

class UserRegistrationController extends Controller
{
    public function register(Request $request)
    {
        // Log the request data
        Log::info('Request received to register user', ['request' => $request->all()]);

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Return validation errors if any
        if ($validator->fails()) {
            Log::error('Validation failed', ['errors' => $validator->errors()]);
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            // Create a new user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_admin' => false,
            ]);

            Log::info('User created successfully', ['user' => $user]);

            // Send welcome email
            try {
                Mail::to($user->email)->send(new WelcomeEmail($user));
                Log::info('Welcome email sent', ['user' => $user]);
            } catch (\Exception $e) {
                Log::error('Error sending welcome email', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
                return response()->json(['message' => 'User registered but failed to send welcome email.'], 500);
            }

            // Return success response
            return response()->json(['message' => 'User registered successfully!', 'user' => $user], 201);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error registering user', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);

            // Return error response
            return response()->json(['message' => 'An error occurred while registering the user. Please try again later.'], 500);
        }
    }
}








