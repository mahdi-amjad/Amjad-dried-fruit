<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    // مرحله دوم: نمایش فرم اطلاعات سفارش
    public function step2()
    {
        $user = auth()->user();
        $cartItems = CartItem::where('user_id', $user->id)
            ->with('product')
            ->get();
        $cartTotal       = $cartItems->sum('original_price');   // جمع کل بدون تخفیف
        $finalTotalItems = $cartItems->sum('final_price');      // جمع کل بعد از تخفیف
        $cartDiscount    = $cartTotal - $finalTotalItems;       // تخفیف کل

        // هزینه ارسال ثابت
        if ($cartItems->count() > 0) {
            $shipping = $finalTotalItems >= 1000000 ? 0 : 50000;
        } else {
            $shipping =  0;
        }
        $finalTotal = $finalTotalItems + $shipping;
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.step1')
                ->with('error', 'سبد خرید خالی است!');
        }

        return view('khoshkbar.checkout.create', compact(
            'cartItems',
            'cartTotal',
            'cartDiscount',
            'finalTotal',
            'shipping'
        ));
    }
   
    public function show(Order $order)
    {
        // فقط کاربر مالک سفارش می‌تواند مشاهده کند
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        $order->load('items.product');

        return view('khoshkbar.orders.show', compact('order'));
    }

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



        $totalPrice = $cartItems->sum('final_price');
        $shipping = $totalPrice >= 1000000 ? 0 : 50000;
        $finalTotal = $totalPrice + $shipping;

        // ایجاد سفارش
        $order = Order::create([
            'user_id'     => $user->id,
            'fullname'    => $request->fullname,
            'province'    => $request->province,
            'city'        => $request->city,
            'address'     => $request->address,
            'plaque'      => $request->plaque,
            'unit'        => $request->unit,
            'phone'       => $request->phone,
            'postal_code' => $request->postal_code,
            'description' => $request->description,
            'status'      => 'pending',
            'total_price' => $finalTotal,
            'payment_token' => Str::random(40),
            'access_token' => Str::random(40)

        ]);


        // ذخیره آیتم‌ها
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $item->product_id,
                'weight'     => $item->weight ?? null,
                'quantity'   => $item->quantity,
                'price'      => $item->product->price,
                'total'      => $item->quantity * $item->product->price,
            ]);
        }


        session(['order_id' => $order->id]);
        return redirect()->route('checkout.pay', [
            'token' => $order->payment_token
        ]);
    }

    // صفحه تایید نهایی
    public function confirm(Order $order, $access_token)
    {
        if ($order->access_token !== $access_token || $order->user_id !== auth()->id()) {
            abort(403); // دسترسی غیرمجاز
        }
        $this->authorize('view', $order);
        $order->load('items.product');
        return view('khoshkbar.checkout.confirm', compact('order'));
    }
}
