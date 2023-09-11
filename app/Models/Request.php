<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'user_id',
        'flat_id',
        'service_id',
        'date',
        'status',
        'amount',
        'company_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function flat()
    {
        return $this->belongsTo(Flat::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }



    public function invoice_items()
    {
        return $this->morphMany(InvoiceItem::class , 'object');
    }




    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
