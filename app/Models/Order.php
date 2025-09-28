<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Morilog\Jalali\Jalalian;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

     public function getCreatedAtJalaliAttribute()
    {
        return Jalalian::forge($this->attributes['created_at'])->format('l j F Y');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            if (!$order->order_number) {
                // گرفتن آخرین شماره سفارش
                $lastOrder = Order::latest('id')->first();
                $lastNumber = $lastOrder ? (int) substr($lastOrder->order_number, -4) : 0;
                $newNumber = $lastNumber + 1;

                // ساخت شماره سفارش به شکل KA-20250928-0001
                $order->order_number = 'KA-' . now()->format('Ymd') . '-' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
            }
        });
    }
}
