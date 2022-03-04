<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freight extends Model
{
    use HasFactory;

    protected $casts = [
        'address' => 'array',
        'date' => 'array',
        'truck' => 'array',
        'truck_type' => 'array',
        'cargo' => 'array'
    ];

    protected $fillable = [
        'address',
        'date',
        'truck',
        'truck_type',
        'cargo',
        'type',
        'owner',
        'status'
    ];
}
