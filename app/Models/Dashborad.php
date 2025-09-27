<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class Dashborad extends Model
{
    use HasFactory;
         public function getCreatedAtJalaliAttribute()
    {
        return Jalalian::forge($this->attributes['created_at'])->format('l j F Y');
    }
}
