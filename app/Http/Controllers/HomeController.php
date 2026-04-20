<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\TravelPackage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $orderedGroups = ['International Package', 'Rinjani & Sembalun Package', 'Lombok Package', 'Other'];

        $travel_packages = TravelPackage::whereIn('group_package', $orderedGroups)
            ->where('is_active', true)
            ->orderByRaw("FIELD(group_package, '" . implode("','", $orderedGroups) . "')")
            ->orderBy('is_popular', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();
        
        $blogs = Blog::get()->take(3);

        return view('homepage', compact('travel_packages','blogs'));
    }
}
