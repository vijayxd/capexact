<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use Illuminate\Http\Request;

class AmenitiesController extends Controller
{
    public function Create(Request $request)
    {
        $amenity = Amenity::create($request->all());

        return $amenity;
    }

    public function Get()
    {
        return Amenity::all();
    }

    public function Delete(Request $request)
    {
        $amenity = Amenity::find($request->id);
        $amenity->delete();

        return 'deleted';
    }

    public function Update(Request $request)
    {
        $amenity = Amenity::find($request->id);

        if ($amenity) {
            $amenity->Update($request->all());
        } else {
            $amenity = Amenity::create($request->all());
        }


        return $amenity;
    }
}
