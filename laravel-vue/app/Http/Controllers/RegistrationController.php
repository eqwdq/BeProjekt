<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProgramRegistration;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        \Log::info('Incoming registration request', $request->all());

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'program_id' => 'required|exists:programs,id',
        ]);

        \Log::info('Validated data', $validated);

        $program = Program::find($request->program_id);

        // Check if the program capacity is reached
        $registrationsCount = Registration::where('program_id', $request->program_id)->count();
        if ($registrationsCount >= $program->capacity) {
            return response()->json(['errors' => ['program' => ['The program capacity has been reached.']]], 422);
        }

        // Check if the user has another registration at the same time
        $userRegistrations = Registration::where('email', $request->email)->with('program')->get();
        foreach ($userRegistrations as $registration) {
            if ($registration->program->day == $program->day && $registration->program->time == $program->time) {
                return response()->json(['errors' => ['program' => ['You are already registered for another program at the same time.']]], 422);
            }
        }

        $registration = Registration::create($validated);

        Mail::to($request->email)->send(new ProgramRegistration($registration, $program));

        return response()->json(['message' => 'Registration successful!'], 201);
    }

    public function index()
    {
        $registrations = Registration::with('program')->get();
        return response()->json($registrations);
    }

    public function userRegistrations(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email|max:255',
        ]);

        $registrations = Registration::where('email', $validated['email'])
                                     ->with('program')
                                     ->get();
        return response()->json($registrations);
    }

    public function unregister($id)
    {
        $registration = Registration::findOrFail($id);
        $registration->delete();

        return response()->json(['message' => 'Unregistered successfully.'], 200);
    }
}

