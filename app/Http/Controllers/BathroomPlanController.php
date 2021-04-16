<?php

namespace App\Http\Controllers;

use App\Models\Bathroomplan;
use Illuminate\Http\Request;

class BathroomPlanController extends Controller
{
    public function Create(Request $request)
    {
        $bath = Bathroomplan::create($request->all());

        return $bath;
    }

    public function Get(){
        return Bathroomplan::all();
    }

    public function Delete(Request $request)
    {
        $bathroom = Bathroomplan::find($request->id);
        $bathroom->delete();

        return 'deleted';
    }

    public function Update(Request $request)
    {
        $bathroom = Bathroomplan::find($request->id);

        if ($bathroom) {
            $bathroom->Update($request->all());
        } else {
            $bathroom = Bathroomplan::create($request->all());
        }


        return $bathroom;
    }
}
