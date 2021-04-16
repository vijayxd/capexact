<?php

namespace App\Http\Controllers;

use App\Models\Floorplan;
use Illuminate\Http\Request;

class FloorplanController extends Controller
{
    public function Create(Request $request)
    {
        $floor = Floorplan::create($request->all());

        return $floor;
    }

    public function Get(){
        
        return Floorplan::all();
    }

    public function Delete(Request $request)
    {
        $floor = Floorplan::find($request->id);
        $floor->delete();

        return 'deleted';
    }

    public function Update(Request $request)
    {
        $floor = Floorplan::find($request->id);

        if ($floor) {
            $floor->Update($request->all());
        } else {
            $floor = Floorplan::create($request->all());
        }


        return $floor;
    }
}
