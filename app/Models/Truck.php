<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;

    protected $casts = [
        'truck_types' => 'array'
    ];

    protected $fillable = [
        'name',
        'truck_types'
    ];
}
