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
            'description' => 'required|string',
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
            'description' => $request->description,
            'image' => $imagePath,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
        ]);

        return response()->json($speaker, 201);
    }

    public function index()
    {
        $speakers = Speaker::all();
        \Log::info($speakers); // This will log the speakers data in storage/logs/laravel.log
        return response()->json($speakers);
    }
}







