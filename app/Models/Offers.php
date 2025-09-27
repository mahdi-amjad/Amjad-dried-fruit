<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class Offers extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function getCreatedAtJalaliAttribute()
    {
        return Jalalian::forge($this->attributes['created_at'])->format('Y/m/d');
    }
}
