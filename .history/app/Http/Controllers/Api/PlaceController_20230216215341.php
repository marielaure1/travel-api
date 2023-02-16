<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($id)
    {
        $location = Location::find($id);

        if(!$location){
            return response()->json(['error' => 'Not Found'], 404);
        }

        $place = Place::where("location_id", $id)->get();
 
        if(!$place){
            return response()->json(['error' => 'Not Found'], 404);
        }

        return response()->json(["place" => $place, "location" => $location], 200);
    }

    public function show($id)
    {
        $location = Place::with('location')->find($id);

        if(!$location){
            return response()->json(['error' => 'Not Found'], 404);
        }

        return response()->json($location, 200);
    }

    public function create(Request $request, $id)
    {
        $location = Location::find($id);

        $this->validate($request, [
            "name" => "required|unique:locations",
            "lat" => "required|numeric",
            "lng" => "required|numeric"
        ]);

        $place = Place::create($request->all());

        if(!$location){
            return response()->json(['error' => 'Not Found'], 404);
        } else if(!$place){
            return response()->json(['error' => 'Unprocessable Entity'], 422);
        }

        return response()->json(["massage" => $place->ame], 201);
    }

    public function update(Request $request, $id)
    {
        $location = Place::find($id);

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
        $location = Place::find($id);

        if(!$location){
            return response()->json(['error' => 'Not Found'], 404);
        }

        $location->delete();

        return response()->json(["message" => "Location deleted"], 204);
    }
}
