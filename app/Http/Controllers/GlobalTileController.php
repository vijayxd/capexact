<?php

namespace App\Http\Controllers;

use App\Models\Globaltile;
use Illuminate\Http\Request;

class GlobaltileController extends Controller
{
    public function Create(Request $request)
    {
        $global = Globaltile::create($request->all());

        return $global;
    }

    
    public function Get()
    {
        return Globaltile::all();
    }

    public function Delete(Request $request)
    {
        $globaltile = Globaltile::find($request->id);
        $globaltile->delete();

        return 'deleted';
    }

    public function Update(Request $request)
    {
        $globaltile = Globaltile::find($request->id);

        if ($globaltile) {
            $globaltile->Update($request->all());
        } else {
            $globaltile = Globaltile::create($request->all());
        }


        return $globaltile;
    }
}
