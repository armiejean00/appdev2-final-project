<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Http\Requests\LocationRequest;

class LocationController extends Controller
{
       // List all locations
    public function index()
    {
        return Location::all();
    }

    // Store a new location
   public function store(LocationRequest $request)
   {
   $location = Location::create($request->validated());

   return response()->json($location, 201);
   }


    // Show a single location
    public function show($id)
    {
        $location = Location::find($id);

        if (!$location) {
            return response()->json(['message' => 'Location not found'], 404);
        }

        return response()->json($location);
    }

    // Update a location
    public function update(LocationRequest $request, $id)
    {
    $location = Location::find($id);

    if (!$location) {
    return response()->json(['message' => 'location not found'], 404);
    }

    $location->update($request->all());

    return response()->json($location);
    }

   
    public function destroy($id)
    {
        $location = Location::find($id);

        if (!$location) {
            return response()->json(['message' => 'Location not found'], 404);
        }

        $location->delete();

        return response()->json(['message' => 'Location deleted successfully']);
    }
}
