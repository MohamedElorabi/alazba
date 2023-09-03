<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'address',
        'floors_count',
    ];

    public function property_document()
    {
        return $this->hasMany(PropertyDocument::class);
    }

    public function flats()
    {
        return $this->hasMany(Flat::class);
    }


    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

}
