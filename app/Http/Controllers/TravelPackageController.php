<?php

namespace App\Http\Controllers;

use App\Models\TravelPackage;
use Illuminate\Http\Request;

class TravelPackageController extends Controller
{
    public function index()
    {
        $orderedGroups = ['International Package', 'Lombok Package', 'Rinjani & Sembalun Package', 'Other'];

        $travel_packages = TravelPackage::whereIn('group_package', $orderedGroups)
            ->where('is_active', true)
            ->orderByRaw("FIELD(group_package, '" . implode("','", $orderedGroups) . "')")
            ->orderBy('created_at', 'desc')
            ->get();

        return view('travel_packages.index', compact('travel_packages'));
    }

    public function show(TravelPackage $travel_package)
    {
        $travel_packages = TravelPackage::where('id', '!=', $travel_package->id)
            ->where('is_active', true)
            ->where('is_popular', true)
            ->orderBy('is_popular', 'desc')
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        return view('travel_packages.show', compact('travel_package', 'travel_packages'));
    }
}
