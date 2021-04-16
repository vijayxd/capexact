<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{




    public function Create(Request $request)
    {
        $property = $request->all();
        $property['user_id'] = Auth::user()->id;
        $property = Property::create($property);

        return $property;
    }

    public function Update(Request $request)
    {
        $property = Property::find($request->id);

        $property->Update($request->all());



        return $property;
    }

    public function Delete(Request $request)
    {
        $property = Property::find($request->id);
        
        $property->delete();

        return 'deleted';
    }




    //
}
