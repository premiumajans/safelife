<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        $sliders = Slider::where('status', 1)->orderBy('order', 'asc')->get();
        return view('frontend.index', get_defined_vars());
    }
}
