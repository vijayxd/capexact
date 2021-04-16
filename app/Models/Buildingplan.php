<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buildingplan extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'calc',
        'cost',
        'photos',
        'url',
        'type',
        'package',
    ];

    protected $casts = [
        'photos' => 'array',
    ];
}
