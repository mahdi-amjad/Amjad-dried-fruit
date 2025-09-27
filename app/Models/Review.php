<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class Review extends Model
{
    use HasFactory;
    
     protected $guarded = [
        'id',
    ];
     public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
      public function getCreatedAtJalaliAttribute()
    {
        return Jalalian::forge($this->attributes['created_at'])->format('l j F Y');
    }
    
}
