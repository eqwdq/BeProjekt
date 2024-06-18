<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validator = \Validator::make($request->all(), [
                'description' => 'required|string|max:1000',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($validator->fails()) {
                Log::error('Validation failed', ['errors' => $validator->errors()]);
                return response()->json(['errors' => $validator->errors()], 422);
            }

            // Handle the image upload
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('reviews', 'public');
            }

            // Create a new review entry
            $review = Review::create([
                'description' => $request->description,
                'image' => $imagePath,
            ]);

            return response()->json($review, 201);
        } catch (\Exception $e) {
            Log::error('Error storing review: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json(['error' => 'An error occurred while storing the review.'], 500);
        }
    }

    public function index()
    {
        try {
            $reviews = Review::all();

            // Modify the image URL if needed
            $reviews->transform(function ($review) {
                $review->image = asset('storage/' . $review->image); // Ensure the path is correct
                return $review;
            });

            return response()->json($reviews, 200);
        } catch (\Exception $e) {
            Log::error('Error fetching reviews: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while fetching reviews.'], 500);
        }
    }

    public function show(Review $review)
    {
        // Modify the image URL if needed
        $review->image = asset('storage/' . $review->image);
        return response()->json($review);
    }

    public function update(Request $request, Review $review)
    {
        Log::info('Request data: ', $request->all());

        $validator = \Validator::make($request->all(), [
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            Log::error('Validation errors: ', $validator->errors()->toArray());
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($request->has('description')) {
            $review->description = $request->description;
        }

        if ($request->hasFile('image')) {
            if ($review->image) {
                Storage::disk('public')->delete($review->image);
            }
            $imagePath = $request->file('image')->store('reviews', 'public');
            $review->image = $imagePath;
        }

        $review->save();

        // Modify the image URL if needed
        $review->image = asset('storage/' . $review->image);

        return response()->json($review);
    }

    public function destroy(Review $review)
    {
        // Delete the review
        if ($review->image) {
            Storage::disk('public')->delete($review->image);
        }
        $review->delete();

        return response()->json(null, 204);
    }
}

