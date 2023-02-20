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
        $place = Place::with('location')->find($id);

        if(!$place){
            return response()->json(['error' => 'Not Found'], 404);
        }

        return response()->json($place, 200);
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

        

        return response()->json(["message" => "$place->name à été créer avec succès !"], 201);
    }

    public function update(Request $request, $id)
    {
        $place = Place::find($id);

        if(!$place){
            return response()->json(['error' => 'Unprocessable Entity'], 422);
        }

        $this->validate($request, [
            "name" => "required|unique:locations,name,".$id,
            "lat" => "required|numeric",
            "lng" => "required|numeric"
        ]);

        $place->name = $request->input('name');
        $place->lat = $request->input('lat');
        $place->lng = $request->input('lng');
        $place->save();

        return response()->json(["message" => "$place->name à été modifié avec succès !"], 200);
    }

    public function delete($id)
    {
        $place = Place::find($id);

        if(!$place){
            return response()->json(['error' => 'Not Found'], 404);
        }

        $place->delete();

        return response()->json(["message" => "$place->name à été modifié avec succès !"], 204);
    }
}
