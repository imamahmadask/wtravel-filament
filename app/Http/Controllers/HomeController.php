<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\TravelPackage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $orderedGroups = ['International Package', 'Rinjani Package', 'Sembalun Package', 'Lombok Package', 'Honeymoon Package', 'Other'];

        $travel_packages = TravelPackage::whereIn('group_package', $orderedGroups)
            ->where('is_active', true)
            ->where('is_popular', true)
            ->orderByRaw("FIELD(group_package, '" . implode("','", $orderedGroups) . "')")
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('group_package')
            ->map(function ($items) {
                return $items->take(3);
            })
            ->flatten();
        
        $blogs = Blog::get()->take(3);

        return view('homepage', compact('travel_packages','blogs'));
    }
}
