<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\plac;

class placController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $plac = plac::with('places')->get();

        return response()->json($plac);
    }

    //
}
