<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'capexbudget',
        'numberofunits',
        'numofbuildings',
        'purchaseprice',
        'renovationPercentage',
        'year',
        'amenities',
        'amenities2',
        'customBathPlan',
        'customBuildingPlan',
        'customKitchenPlan',
        'floorplans',
        'globalTiles',
        'miscelaneous',
        'user_id',
        'address',
        'city',
        'state',
        'zip'
    ];

    protected $casts = [
        'amenities' => 'array',
        'amenities2' => 'array',
        'customBathPlan' => 'array',
        'customBuildingPlan' => 'array',
        'customKitchenPlan' => 'array',
        'floorplans' => 'array',
        'globalTiles' => 'array',
        'miscelaneous' => 'array',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
