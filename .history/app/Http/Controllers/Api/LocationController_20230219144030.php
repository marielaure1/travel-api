<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class LocationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $location = Location::with('place')->get();

        return response()->json($location, 200);
    }

    public function show($id)
    {
        $location = Location::find($id);

        if(!$location){
            return response()->json(['error' => 'Not Found'], 404);
        }

        return response()->json($location, 200);
    }

    public function create(Request $request): JsonResponse
    {

        $this->validate($request, [
            "name" => "required|unique:locations",
            "lat" => "required|numeric",
            "lng" => "required|numeric"
        ]);

        $location = Location::create($request->all());
        $location->name = $request->input('name');
        $location->lat = $request->input('lat');
        $location->lng = $request->input('lng');
        $location->slug = Str::slug($location->name, '-');
        $location->save();

        if(!$location){
            return response()->json(['error' => 'Unprocessable Entity'], 422);
        }

        return response()->json(["message" => "$location->name à été créer avec succès !"], 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $find = Location::find($id);

        if(!$find){
            return response()->json(['error' => 'Not Found'], 404);
        }

        // $this->validate($request, [
        //     "name" => "required|unique:locations,name,".$id,
        //     "lat" => "required|numeric",
        //     "lng" => "required|numeric"
        // ]);

        $location = Location::->where('id', $id)->update($request->all());
        $location->name = $request->input('name');
        $location->lat = $request->input('lat');
        $location->lng = $request->input('lng');
        $location->slug = Str::slug($location->name , '-');
        $location->save();

        return response()->json(["message" => "$location->name à été modifié avec succès !"], 200);
    }

    public function delete($id): JsonResponse
    {
        $location = Location::find($id);

        if(!$location){
            return response()->json(['error' => 'Not Found'], 404);
        }
        $name = $location->name;

        $location->delete();

        return response()->json(["message" => "$name à été modifié avec succès !"], 204);
    }
    
}
