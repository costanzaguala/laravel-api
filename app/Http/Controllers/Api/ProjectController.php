<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Project;

// Helpers per slug
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects= Project::with('type', 'technologies')->paginate(3);
        return response()->json([
            'success' => true,
            'results' => $projects,
        ]);
    }

    public function show(string $slug)
    {
        $projects= Project::where('slug', $slug)->with('type', 'technologies')->firstOrFail();

        return response()->json([
            'success' => true,
            'results' => $projects,
        ]);
    }
}