<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(BookingRequest $request)
    {
        Booking::create($request->validated());

        return redirect()->back()->with([
            'message' => "Success, we'll process your booking"
        ]);
    }
}
