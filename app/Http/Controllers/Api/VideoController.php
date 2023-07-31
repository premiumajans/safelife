<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Video;

class VideoController extends Controller
{
    public function index()
    {
        if (Video::where('status', 1)->exists()) {
            return response()->json(['video' => Video::where('status', 1)->get()], 200);
        } else {
            return response()->json(['video' => 'Video-is-empty'], 404);
        }
    }

    public function show($id)
    {
        if (Video::where('status', 1)->where('id', $id)->exists()) {
            return response()->json(['video' => Video::where('status', 1)->where('id', $id)->first()], 200);
        } else {
            return response()->json(['video' => 'video-is-not-founded'], 404);
        }
    }
}
