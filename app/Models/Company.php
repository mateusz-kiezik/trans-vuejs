<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'name',
        'country',
        'street',
        'street_number',
        'city',
        'postal_code',
        'tax_number',
        'phone',
        'email'
    ];
}
