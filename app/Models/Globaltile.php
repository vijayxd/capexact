<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Globaltile extends Model
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
        'type'
    ];

    protected $casts = [
        'photos' => 'array',
    ];
}
