<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];
    public function getCreatedAtJalaliAttribute()
    {
        return Jalalian::forge($this->attributes['created_at'])->format('Y/m/d');
    }

    protected static function boot()
    {
        parent::boot();

        // Event for automatically generating a product code when creating a product
        static::creating(function ($product) {
            $product->product_code = 'SKU-' . strtoupper(Str::random(6));
        });
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'Id_category'); // فیلد Id_category به عنوان کلید خارجی
    }
    public function specifications()
    {
        return $this->hasMany(ProductSpecification::class);
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }

    public function activeDiscount()
    {
        $now = now();

        // تخفیف محصول
        $discount = $this->discounts()
            ->where(function ($q) use ($now) {
                $q->whereNull('start_date')->orWhere('start_date', '<=', $now);
            })
            ->where(function ($q) use ($now) {
                $q->whereNull('end_date')->orWhere('end_date', '>=', $now);
            })
            ->latest()
            ->first();

        // اگر تخفیف محصول نبود، تخفیف دسته‌بندی
        if (!$discount && $this->category) {
            $discount = $this->category->discounts()
                ->where(function ($q) use ($now) {
                    $q->whereNull('start_date')->orWhere('start_date', '<=', $now);
                })
                ->where(function ($q) use ($now) {
                    $q->whereNull('end_date')->orWhere('end_date', '>=', $now);
                })
                ->latest()
                ->first();
        }

        return $discount;
    }

    public function discountedPrice()
    {
        $discount = $this->activeDiscount();
        if (!$discount) return $this->price;

        if ($discount->type === 'percent') {
            return $this->price * (1 - $discount->value / 100);
        } else {
            return $this->price - $discount->value;
        }
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
