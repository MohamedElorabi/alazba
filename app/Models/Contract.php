<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'user_id',
        'flat_id',
        'property_id',
        'start_date',
        'end_date',
        'status',
        'amount',
    ];
}
