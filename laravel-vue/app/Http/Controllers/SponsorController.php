<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsor;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SponsorController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validator = \Validator::make($request->all(), [
                'link' => 'required|url|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($validator->fails()) {
                Log::error('Validation failed', ['errors' => $validator->errors()]);
                return response()->json(['errors' => $validator->errors()], 422);
            }

            // Handle the image upload
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('sponsors', 'public');
            }

            // Create a new sponsor entry
            $sponsor = Sponsor::create([
                'link' => $request->link,
                'image' => $imagePath,
            ]);

            return response()->json($sponsor, 201);
        } catch (\Exception $e) {
            Log::error('Error storing sponsor: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json(['error' => 'An error occurred while storing the sponsor.'], 500);
        }
    }

    public function index()
    {
        try {
            $sponsors = Sponsor::all();
            return response()->json($sponsors, 200);
        } catch (\Exception $e) {
            Log::error('Error fetching sponsors: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while fetching sponsors.'], 500);
        }
    }
}




