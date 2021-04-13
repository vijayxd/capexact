<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AmenitiesController extends Controller
{
    public function Create(Request $request)
    {
        $file = $request->file('img');

        return  $file->move(storage_path('\images'), $file->getClientOriginalName());
    }
}
