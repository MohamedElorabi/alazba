<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','object_id','type','title_ar','title_en','description_ar','description_en'];



    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function object()
    {
        return $this->morphTo();
    }

}
