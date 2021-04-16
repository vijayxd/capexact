<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Miscellaneousplan extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'info',
        'cost',
        'photos',
        'url'
    ];

    protected $casts = [
        'photos' => 'array',
    ];
}
