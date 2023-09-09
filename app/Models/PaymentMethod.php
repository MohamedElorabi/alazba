<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;


    protected $fillable = ['name_ar','name_en','image','available'];



    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }

}
