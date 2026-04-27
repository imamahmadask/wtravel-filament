<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\TravelPackage;
use App\Services\GooglePlacesService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(GooglePlacesService $googlePlaces)
    {
        $orderedGroups = ['International Package', 'Rinjani & Sembalun Package', 'Lombok Package', 'Honeymoon Package', 'Other'];

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

        $googleData = $googlePlaces->getReviews();
        $reviews             = $googleData['reviews'] ?? [];
        $placeRating         = $googleData['rating'] ?? null;
        $userRatingsTotal    = $googleData['user_ratings_total'] ?? null;

        return view('homepage', compact('travel_packages', 'blogs', 'reviews', 'placeRating', 'userRatingsTotal'));
    }
}
