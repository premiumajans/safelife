<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\PartnerTranslation;
use App\Models\Product;
use App\Models\ProductTranslation;
use App\Models\Project;
use App\Models\ProjectTranslation;
use App\Models\Service;
use App\Models\ServiceTranslation;

class SearchController extends Controller
{
    public function search($keyword)
    {
        $productsArray = array_unique(ProductTranslation::where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('description', 'LIKE', '%' . $keyword . '%')
            ->pluck('product_id')
            ->toArray());
        $servicesArray = array_unique(ServiceTranslation::where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('description', 'LIKE', '%' . $keyword . '%')
            ->pluck('service_id')
            ->toArray());
        $projectsArray = array_unique(ProjectTranslation::where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('description', 'LIKE', '%' . $keyword . '%')
            ->pluck('project_id')
            ->toArray());
        $partnersArray = array_unique(PartnerTranslation::where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('description', 'LIKE', '%' . $keyword . '%')
            ->pluck('partner_id')
            ->toArray());
        return response()->json([
            'results' => [
                'products' => Product::whereIn('id', $productsArray)->with('photos')->get(),
                'services' => Service::whereIn('id', $servicesArray)->with('photos')->get(),
                'projects' => Project::whereIn('id', $projectsArray)->get(),
                'partners' => Partner::whereIn('id', $partnersArray)->with('photos')->get(),
            ],
            'keyword' => $keyword
        ]);
    }
}
