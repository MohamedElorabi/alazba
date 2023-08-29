<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyDocument extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'file',
        'expiry_date',
        'property_id'
    ];
}
