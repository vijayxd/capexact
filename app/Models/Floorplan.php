<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Floorplan extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bathCabinets',
        'interiorDoors',
        'kitchenCabinets',
        'lights',
        'plan',
        'sinks',
        'sqft',
        'toilets',
        'tubs',
    ];

    protected $casts = [
        'photos' => 'array',
    ];
}
