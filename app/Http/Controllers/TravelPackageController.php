<?php

namespace App\Http\Controllers;

use App\Models\TravelPackage;
use Illuminate\Http\Request;

class TravelPackageController extends Controller
{
    public function index(Request $request)
    {
        $orderedGroups = ['International Package', 'Rinjani Package', 'Sembalun Package', 'Lombok Package', 'Honeymoon Package', 'Other'];

        $selectedGroup = $request->get('group');

        $query = TravelPackage::query()->where('is_active', true);

        if ($selectedGroup && in_array($selectedGroup, $orderedGroups)) {
            $query->where('group_package', $selectedGroup);
        } else {
            $query->whereIn('group_package', $orderedGroups);
        }

        $travel_packages = $query->orderByRaw("FIELD(group_package, '" . implode("','", $orderedGroups) . "')")
            ->orderBy('title', 'asc')
            ->orderBy('is_popular', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('travel_packages.index', compact('travel_packages', 'orderedGroups', 'selectedGroup'));
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

    public function group($group)
    {
        $travel_packages = TravelPackage::where('group_package', $group)
            ->where('is_active', true)
            ->orderBy('is_popular', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('travel_packages.group', compact('travel_packages', 'group'));
    }
}
