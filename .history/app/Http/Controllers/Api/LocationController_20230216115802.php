<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Location;

class LocationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $location = Location::with('place')->get();

        return response()->json($location);
    }

    public function create(request $request)
    {
        $location = Location::create($request);

        return response()->json($location);
    }

    //
}
