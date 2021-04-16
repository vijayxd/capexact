<?php

namespace App\Http\Controllers;

use App\Models\Miscellaneousplan;
use Illuminate\Http\Request;

class MiscellaneousController extends Controller
{
    public function Create(Request $request)
    {
        $miscellaneous = Miscellaneousplan::create($request->all());

        return $miscellaneous;
    }

    public function Get()
    {
        return Miscellaneousplan::all();
    }

    public function Delete(Request $request)
    {
        $miscellaneous = Miscellaneousplan::find($request->id);
        $miscellaneous->delete();

        return 'deleted';
    }

    public function Update(Request $request)
    {
        $miscellaneous = Miscellaneousplan::find($request->id);

        if ($miscellaneous) {
            $miscellaneous->Update($request->all());
        } else {
            $miscellaneous = Miscellaneousplan::create($request->all());
        }


        return $miscellaneous;
    }
}
