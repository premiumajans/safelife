<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        if (Project::where('status', 1)->exists()) {
            return response()->json(['project' => Project::where('status', 1)->with('photos')->get()], 200);
        } else {
            return response()->json(['project' => 'Project-is-empty'], 404);
        }
    }

    public function show($id)
    {
        if (Project::where('status', 1)->where('id', $id)->exists()) {
            return response()->json(['project' => Project::where('status', 1)->where('id', $id)->with('photos')->first()], 200);
        } else {
            return response()->json(['project' => 'project-is-not-founded'], 404);
        }
    }
}
