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


    public function property()
    {
        return $this->belongsTo(Property::class);
    }


    public function flat()
    {
        return $this->belongsTo(Flat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function invoice_items()
    {
        return $this->morphMany(InvoiceItem::class , 'object');
    }


}
