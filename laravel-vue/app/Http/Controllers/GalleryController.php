<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function store(Request $request)
    {
        // Log the request data
        Log::info('Request data:', $request->all());

        $validator = \Validator::make($request->all(), [
            'category' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            Log::error('Validation failed', ['errors' => $validator->errors()]);
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Handle the image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('gallery', 'public');
        }

        // Create a new gallery entry
        $gallery = Gallery::create([
            'category' => $request->category,
            'image' => $imagePath,
        ]);

        Log::info('Gallery entry created:', $gallery->toArray());

        return response()->json($gallery, 201);
    }
    public function index()
    {
        try {
            $images = Gallery::all();
            return response()->json($images, 200);
        } catch (\Exception $e) {
            Log::error('Error fetching gallery images: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while fetching gallery images.'], 500);
        }
    }
}



