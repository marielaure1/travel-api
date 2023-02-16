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

    public function show($id)
    {
        $location = Location::find($id);

        if(!$location){
            return response()->json(['error' => 'Cette localisation n\'exite pas'], 404);
        }

        return response()->json($location);
    }

    public function create(request $request)
    {
        $this->validate($request, [
            "name" => "required|unique:locations",
            "lat" => "required|numeric",
            "lng" => "required|numeric"
        ]);

        $location = Location::create($request->all());
        return response()->json(["welcome" => $location->first_name], status:201);
    }

    public function up(request $request)
    {
        $this->validate($request, [
            "name" => "required|unique:locations",
            "lat" => "required|numeric",
            "lng" => "required|numeric"
        ]);

        $location = Location::create($request->all());
        return response()->json(["welcome" => $location->first_name], status:201);
    }
    //
}
