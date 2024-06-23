<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Validator;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Create a new page
        $page = Page::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return response()->json($page, 201);
    }

    public function index()
    {
        $pages = Page::all();
        return response()->json($pages);
    }

    public function show(Page $page)
    {
        return response()->json($page);
    }

    public function update(Request $request, Page $page)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Update the page
        $page->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return response()->json($page);
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return response()->json(null, 204);
    }
}

