<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function index()
    {
        if (Photo::where('status', 1)->exists()) {
            return response()->json(['photo' => Photo::where('status', 1)->with('photos')->get()], 200);
        } else {
            return response()->json(['photo' => 'Photo-is-empty'], 404);
        }
    }

    public function show($id)
    {
        if (Photo::where('status', 1)->where('id', $id)->exists()) {
            return response()->json(['photo' => Photo::where('status', 1)->where('id', $id)->with('photos')->first()], 200);
        } else {
            return response()->json(['photo' => 'photo-is-not-founded'], 404);
        }
    }
}
