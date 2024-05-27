<?php

// app/Http/Controllers/ProgramController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'day' => 'required|string|max:255',
            'time' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'speaker' => 'required|string|max:255',
            'speaker_link' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

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
    }

    public function index()
    {
        $programs = Program::all();
        return response()->json($programs);
    }

    public function show(Program $program)
    {
        return response()->json($program);
    }

    public function update(Request $request, Program $program)
    {
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
            Log::error('Validation errors: ', $validator->errors()->toArray());
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $program->day = $request->day;
        $program->time = $request->time;
        $program->title = $request->title;
        $program->description = $request->description;
        $program->speaker = $request->speaker;
        $program->speaker_link = $request->speaker_link;

        if ($request->hasFile('image')) {
            if ($program->image) {
                Storage::disk('public')->delete($program->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $program->image = $imagePath;
        }

        $program->save();

        return response()->json($program);
    }

    public function destroy(Program $program)
    {
        // Delete the program
        if ($program->image) {
            Storage::disk('public')->delete($program->image);
        }
        $program->delete();

        return response()->json(null, 204);
    }
}







