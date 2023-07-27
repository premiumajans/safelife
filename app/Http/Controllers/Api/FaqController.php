<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        if (Faq::where('status', 1)->exists()) {
            return response()->json(['faq' => Faq::where('status', 1)->with('photos')->get()], 200);
        } else {
            return response()->json(['faq' => 'Faq-is-empty'], 404);
        }
    }

    public function show($id)
    {
        if (Faq::where('status', 1)->where('id', $id)->exists()) {
            return response()->json(['faq' => Faq::where('status', 1)->where('id', $id)->with('photos')->first()], 200);
        } else {
            return response()->json(['faq' => 'faq-is-not-founded'], 404);
        }
    }
}
