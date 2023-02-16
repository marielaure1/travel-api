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
        $location = Location::width('palce')->find($id);

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

    public function update(request $request, $id)
    {
        $location = Location::find($id);

        if(!$location){
            return response()->json(['error' => 'Cette localisation n\'exite pas'], 404);
        }

        $this->validate($request, [
            "name" => "required|unique:locations,name,".$id,
            "lat" => "required|numeric",
            "lng" => "required|numeric"
        ]);

        $location->name = $request->input('name');
        $location->lat = $request->input('lat');
        $location->lng = $request->input('lng');;
        $location->save();
        return response()->json(["welcome" => $location->first_name], status:201);
    }
    //
}
