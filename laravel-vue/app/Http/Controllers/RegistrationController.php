<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        // Log the incoming request data for debugging
        \Log::info('Incoming registration request', $request->all());

        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'program_id' => 'required|exists:programs,id',
        ]);

        // Log the validated data for debugging
        \Log::info('Validated data', $validated);

        // Create the registration
        $registration = Registration::create($validated);

        // Find the program
        $program = Program::find($request->program_id);

        // Send the confirmation email
        \Mail::to($request->email)->send(new \App\Mail\ProgramRegistration($registration, $program));

        return response()->json(['message' => 'Registration successful!'], 201);
    }

    public function index()
    {
        $registrations = Registration::with('program')->get();
        return response()->json($registrations);
    }
}
