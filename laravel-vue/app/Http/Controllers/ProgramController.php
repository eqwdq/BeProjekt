<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use Validator;
use Illuminate\Support\Facades\Log;

class ProgramController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validate the request data
            $validator = Validator::make($request->all(), [
                'day' => 'required|string|max:255',
                'time' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'speaker' => 'required|string|max:255',
                'speaker_link' => 'nullable|url',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 400);
            }

            // Handle the image upload
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
            }

            // Create a new program
            $program = Program::create([
                'day' => $request->day,
                'time' => $request->time,
                'title' => $request->title,
                'description' => $request->description,
                'speaker' => $request->speaker,
                'speaker_link' => $request->speaker_link,
                'image' => $imagePath,
            ]);

            return response()->json($program, 201);
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error creating program: ' . $e->getMessage());

            // Return an error response
            return response()->json(['error' => 'An error occurred while creating the program. Please try again later.'], 500);
        }
    }

    public function show(Program $program)
{
    return response()->json($program);
}

}


