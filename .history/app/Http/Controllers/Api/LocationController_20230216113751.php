<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $location::width('places')->get();
    }

    //
}
