<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

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

        return response()->json($location, 200);
    }

    public function show($id)
    {
        $location = Location::with('place')->find($id);

        if(!$location){
            return response()->json(['error' => 'Not Found'], 404);
        }

        return response()->json($location, 200);
    }

    public function create(Request $request)
    {
        if(!$location){
            return response()->json(['error' => 'Not Found'], 404);
        }
        
        $this->validate($request, [
            "name" => "required|unique:locations",
            "lat" => "required|numeric",
            "lng" => "required|numeric"
        ]);

        $location = Location::create($request->all());
        return response()->json(["welcome" => $location->first_name], 201);
    }

    public function update(Request $request, $id)
    {
        $location = Location::find($id);

        if(!$location){
            return response()->json(['error' => 'Not Found'], 404);
        }

        $this->validate($request, [
            "name" => "required|unique:locations,name,".$id,
            "lat" => "required|numeric",
            "lng" => "required|numeric"
        ]);

        $location->name = $request->input('name');
        $location->lat = $request->input('lat');
        $location->lng = $request->input('lng');
        $location->save();

        return response()->json(["success update" => $id], 200);
    }

    public function delete($id)
    {
        $location = Location::find($id);

        if(!$location){
            return response()->json(['error' => 'Not Found'], 404);
        }

        $location->delete();

        return response()->json(["message" => "Location deleted"]);
    }
    //
}
