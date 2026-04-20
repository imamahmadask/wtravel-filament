<?php

namespace App\Http\Controllers;

use App\Models\TravelPackage;
use Illuminate\Http\Request;

class TravelPackageController extends Controller
{
    public function index()
    {
        $travel_packages = TravelPackage::orderBy('created_at', 'desc')
            ->where('is_active', true)->get();

        return view('travel_packages.index', compact('travel_packages'));
    }

    public function show(TravelPackage $travel_package)
    {
        $travel_packages = TravelPackage::where('id', '!=', $travel_package->id)
                            ->where('is_active', true)
                            ->orderBy('created_at', 'desc')->limit(6)->get();

        return view('travel_packages.show', compact('travel_package', 'travel_packages'));
    }
}
