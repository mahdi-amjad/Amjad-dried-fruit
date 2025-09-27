<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class category extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];
    public function getCreatedAtJalaliAttribute()
    {
        return Jalalian::forge($this->attributes['created_at'])->format('Y/m/d');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'Id_category'); // فیلد Id_category به عنوان کلید خارجی
    }

public function discounts()
{
    return $this->hasMany(Discount::class);
}

}
