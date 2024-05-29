<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speaker;
use Illuminate\Support\Facades\Storage;

class SpeakerController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
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
            'name' => $request->name,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'image' => $imagePath,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
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
        // Log the request data for debugging
        \Log::info('Request data:', $request->all());

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
        ]);

        // Update speaker data
        $speaker->name = $request->name;
        $speaker->short_description = $request->short_description;
        $speaker->long_description = $request->long_description;
        $speaker->instagram = $request->instagram;
        $speaker->youtube = $request->youtube;

        // Handle image update
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($speaker->image) {
                Storage::disk('public')->delete($speaker->image);
            }
            // Store new image
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
        // Delete the speaker
        if ($speaker->image) {
            Storage::disk('public')->delete($speaker->image);
        }
        $speaker->delete();

        return response()->json(null, 204);
    }
}










