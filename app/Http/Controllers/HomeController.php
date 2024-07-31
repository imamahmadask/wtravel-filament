<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\TravelPackage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $travel_packages = TravelPackage::all();
        $blogs = Blog::get()->take(3);

        return view('homepage', compact('travel_packages','blogs'));
    }
}
