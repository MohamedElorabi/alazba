<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'property_id',
        'floor_number',
        'distance',
        'rent_amount',
    ];


    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function contract()
    {
        return $this->hasOne(Contract::class);
    }


    public function request()
    {
        return $this->hasMany(Request::class);
    }
}

