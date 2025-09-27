<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class WholesaleInquiry extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'name', 'phone', 'approx_quantity', 'message', 'status'];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
         public function getCreatedAtJalaliAttribute()
    {
        return Jalalian::forge($this->attributes['created_at'])->format('l j F Y');
    }
}
