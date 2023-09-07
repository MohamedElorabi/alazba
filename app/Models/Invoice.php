<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;


    protected $fillable = ['user_id','total','paid','debit','status','date','expiry_date','method'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    public function invoice_items()
    {
        return $this->hasMany(InvoiceItem::class);
    }


}
