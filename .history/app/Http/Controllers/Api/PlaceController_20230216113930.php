<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Place;

class PlaceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $place = place::with('places')->get();

        return response()->json($place);
    }

    //
}
