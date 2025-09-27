<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // مرحله دوم: نمایش فرم اطلاعات سفارش
    public function step2()
    {
        $user = auth()->user();
        $cartItems = CartItem::where('user_id', $user->id)
            ->with('product')
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.step1')
                ->with('error', 'سبد خرید خالی است!');
        }

        return view('khoshkbar.checkout.create', compact('cartItems'));
    }

    // ذخیره سفارش
    public function placeOrder(Request $request)
    {
        $request->validate([
            'fullname'       => 'required|string|max:255',
            'province'       => 'required|string|max:255',
            'city'           => 'required|string|max:255',
            'address'        => 'required|string',
            'plaque'         => 'required|string|max:50',
            'phone'          => 'required|string|max:20',
            'postal_code'    => 'required|string|max:20',
            'unit'           => 'nullable|string|max:50',
            'description'    => 'nullable|string',
        ]);

        $user = auth()->user();
        $cartItems = CartItem::where('user_id', $user->id)
            ->with('product')
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.step1')
                ->with('error', 'سبد خرید خالی است!');
        }

        // محاسبه مجموع سفارش
        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item->quantity * $item->product->price;
        }

        // ایجاد سفارش
        $order = Order::create([
            'user_id'        => $user->id,
            'fullname'       => $request->fullname,
            'province'       => $request->province,
            'city'           => $request->city,
            'address'        => $request->address,
            'plaque'         => $request->plaque,
            'unit'           => $request->unit,
            'phone'          => $request->phone,
            'postal_code'    => $request->postal_code,
            'description'    => $request->description,
            'status'         => 'pending',
            'total_price'    => $totalPrice,
        ]);

        // ذخیره آیتم‌های سفارش
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $item->product_id,
                'weight'     => $item->weight ?? null, // اگه وزن داری
                'quantity'   => $item->quantity,
                'price'      => $item->product->price,
                'total'      => $item->quantity * $item->product->price,
            ]);
        }

        // خالی کردن سبد خرید
        CartItem::where('user_id', $user->id)->delete();

        return redirect()->route('order.confirm', $order->id)
            ->with('success', 'سفارش شما با موفقیت ثبت شد.');
    }

    // صفحه تایید نهایی
    public function confirm(Order $order)
    {
        // فقط سفارشی که برای کاربر فعلی هست نمایش داده بشه
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        $order->load('items.product');

        return view('khoshkbar.checkout.confirm', compact('order'));
    }
}
