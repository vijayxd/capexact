<?php

namespace App\Http\Controllers;

use App\Models\Kitchenplan;
use Illuminate\Http\Request;

class KitchenPlanController extends Controller
{
    public function Create(Request $request)
    {
        $kitchen = Kitchenplan::create($request->all());

        return $kitchen;
    }

    public function Get()
    {
        return Kitchenplan::all();
    }

    public function Delete(Request $request)
    {
        $kitchen = Kitchenplan::find($request->id);
        $kitchen->delete();

        return 'deleted';
    }

    public function Update(Request $request)
    {
        $kitchen = Kitchenplan::find($request->id);

        if ($kitchen) {
            $kitchen->Update($request->all());
        } else {
            $kitchen = Kitchenplan::create($request->all());
        }


        return $kitchen;
    }
}
