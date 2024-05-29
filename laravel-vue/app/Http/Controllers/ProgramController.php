<?php

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
            'short_description' => 'required|string',
            'long_description' => 'required|string',
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
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
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
    Log::info('Request data: ', $request->all());

    $validator = Validator::make($request->all(), [
        'day' => 'nullable|string|max:255',
        'time' => 'nullable|string|max:255',
        'title' => 'nullable|string|max:255',
        'short_description' => 'nullable|string',
        'long_description' => 'nullable|string',
        'speaker' => 'nullable|string|max:255',
        'speaker_link' => 'nullable|url',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($validator->fails()) {
        Log::error('Validation errors: ', $validator->errors()->toArray());
        return response()->json(['errors' => $validator->errors()], 422);
    }

    if ($request->has('day')) {
        $program->day = $request->day;
    }
    if ($request->has('time')) {
        $program->time = $request->time;
    }
    if ($request->has('title')) {
        $program->title = $request->title;
    }
    if ($request->has('short_description')) {
        $program->short_description = $request->short_description;
    }
    if ($request->has('long_description')) {
        $program->long_description = $request->long_description;
    }
    if ($request->has('speaker')) {
        $program->speaker = $request->speaker;
    }
    if ($request->has('speaker_link')) {
        $program->speaker_link = $request->speaker_link;
    }

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












