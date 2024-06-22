<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speaker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class SpeakerController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
        ]);

        // Handle the image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Create a new speaker
        $speaker = Speaker::create([
            'name' => $validatedData['name'],
            'short_description' => $validatedData['short_description'],
            'long_description' => $validatedData['long_description'],
            'image' => $imagePath,
            'instagram' => $validatedData['instagram'],
            'youtube' => $validatedData['youtube'],
        ]);

        return response()->json($speaker, 201);
    }

    public function index()
    {
        $speakers = Speaker::all();
        return response()->json($speakers);
    }

    public function update(Request $request, Speaker $speaker)
    {
        Log::info('Request data: ', $request->all());

        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            Log::error('Validation errors: ', $validator->errors()->toArray());
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($request->has('name')) {
            $speaker->name = $request->name;
        }
        if ($request->has('short_description')) {
            $speaker->short_description = $request->short_description;
        }
        if ($request->has('long_description')) {
            $speaker->long_description = $request->long_description;
        }
        if ($request->has('instagram')) {
            $speaker->instagram = $request->instagram;
        }
        if ($request->has('youtube')) {
            $speaker->youtube = $request->youtube;
        }

        if ($request->hasFile('image')) {
            if ($speaker->image) {
                Storage::disk('public')->delete($speaker->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $speaker->image = $imagePath;
        }

        $speaker->save();

        return response()->json($speaker);
    }

    public function show(Speaker $speaker)
    {
        return response()->json($speaker);
    }

    public function destroy(Speaker $speaker)
    {
        if ($speaker->image) {
            Storage::disk('public')->delete($speaker->image);
        }
        $speaker->delete();

        return response()->json(null, 204);
    }
}












