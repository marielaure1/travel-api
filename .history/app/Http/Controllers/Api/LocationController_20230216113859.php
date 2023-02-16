<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Location

class LocationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $location = Location::with('places')->get();

        return response()->json($location);
    }

    //
}
