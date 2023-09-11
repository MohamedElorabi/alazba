<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Company extends Model
{
    use HasFactory;
    use Sluggable;


    protected $fillable = ['name', 'logo', 'slug'];



    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }



    public function property()
    {
        return $this->hasMany(Property::class);
    }



    public function request()
    {
        return $this->hasMany(Request::class);
    }


    public function user()
    {
        return $this->hasMany(User::class);
    }


    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }

    public function contract()
    {
        return $this->hasMany(Contract::class);
    }

}
