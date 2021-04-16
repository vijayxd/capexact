<?php

namespace App\Http\Controllers;

use App\Models\Buildingplan;
use Illuminate\Http\Request;

class BuildingplanController extends Controller
{
    public function Create(Request $request)
    {
        $bath = Buildingplan::create($request->all());

        return $bath;
    }

    public function Get(){
        return Buildingplan::all();
    }

    public function Delete(Request $request)
    {
        $building = Buildingplan::find($request->id);
        $building->delete();

        return 'deleted';
    }

    public function Update(Request $request)
    {
        $building = Buildingplan::find($request->id);

        if ($building) {
            $building->Update($request->all());
        } else {
            $building = Buildingplan::create($request->all());
        }


        return $building;
    }
}
