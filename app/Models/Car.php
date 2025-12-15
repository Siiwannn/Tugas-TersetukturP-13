<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'name',
        'brand',
        'model',
        'year',
        'price',
        'color',
        'engine_type',
        'fuel_type',
        'transmission',
        'mileage',
        'description',
        'image',
    ];
}
