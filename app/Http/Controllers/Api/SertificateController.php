<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sertificate;

class SertificateController extends Controller
{
    public function index()
    {
        if (Sertificate::where('status', 1)->exists()) {
            return response()->json(['sertificate' => Sertificate::where('status', 1)->get()], 200);
        } else {
            return response()->json(['sertificate' => 'sertificate-is-empty'], 404);
        }
    }

    public function show($id)
    {
        if (Sertificate::where('status', 1)->where('id', $id)->exists()) {
            return response()->json(['sertificate' => Sertificate::where('status', 1)->where('id', $id)->first()], 200);
        } else {
            return response()->json(['sertificate' => 'sertificate-is-not-founded'], 404);
        }
    }
}
