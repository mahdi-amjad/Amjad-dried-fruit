<?php

namespace App\Http\Controllers\Cart;

use App\Events\ItemRemoved;
use App\Http\Controllers\Controller;
use App\Models\Cartitem;
use App\Models\Product;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        $user = auth()->user();
        if (!$user) {
            toast('ابتدا وارد سایت شوید', 'error');
            return redirect()->route('login');
        }

        $product = Product::find($productId);
        if (!$product) {
            toast('محصول یافت نشد', 'error');
            return redirect()->back();
        }

        $validated = $request->validate([
            'weight'   => 'nullable|integer|min:1',   // وزن می‌تونه خالی باشه
            'quantity' => 'required|integer|min:1',
        ]);

        // اگر وزن نیاد → پیش‌فرض 500 گرم
        $weight = $validated['weight'] ?? 500;

        $unitPrice       = $product->price;
        $discountedPrice = $product->discountedPrice();

        // بررسی اینکه محصول با همان وزن در سبد وجود دارد یا خیر
        $cartItem = CartItem::where('user_id', $user->id)
            ->where('product_id', $product->id)
            ->where('weight', $weight)
            ->first();

        if ($cartItem) {
            // بروزرسانی تعداد
            $cartItem->quantity += $validated['quantity'];

            // محاسبه قیمت کل بر اساس وزن و تعداد
            $cartItem->original_price = $unitPrice * $cartItem->quantity * ($weight / 500);
            $cartItem->final_price    = $discountedPrice * $cartItem->quantity * ($weight / 500);

            $cartItem->save();
            toast('محصول در سبد خرید بروزرسانی شد', 'success');
        } else {
            // محاسبه قیمت کل بر اساس وزن و تعداد
            $totalOriginal = $unitPrice * $validated['quantity'] * ($weight / 500);
            $totalFinal    = $discountedPrice * $validated['quantity'] * ($weight / 500);

            CartItem::create([
                'user_id'        => $user->id,
                'product_id'     => $product->id,
                'weight'         => $weight,
                'quantity'       => $validated['quantity'],
                'original_price' => $totalOriginal,
                'final_price'    => $totalFinal,
            ]);
            toast('محصول به سبد خرید اضافه شد', 'success');
        }

        return redirect()->route('cart.step1');
    }

    public function showCart()
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login');
        }
        $cartItems = CartItem::where('user_id', auth()->id())->get();
        $cartTotal       = $cartItems->sum('original_price');   // جمع کل بدون تخفیف
        $finalTotalItems = $cartItems->sum('final_price');      // جمع کل بعد از تخفیف
        $cartDiscount    = $cartTotal - $finalTotalItems;       // تخفیف کل

        // هزینه ارسال ثابت
          if ($cartItems->count() > 0) {
                $shipping = $finalTotalItems >= 1000000 ? 0 : 50000;
        } else {
           $shipping =  0;
        }
        // مبلغ نهایی
        $finalTotal = $finalTotalItems + $shipping;
        return view('khoshkbar.Cart.index', compact(
            'cartItems',
            'cartTotal',
            'cartDiscount',
            'finalTotal',
            'shipping'
        ));
    }



    public function removeFromCart($cartItemId)
    {

        if (!is_numeric($cartItemId)) {
            return redirect()->route('cart.step1')->with('error', 'شناسه نامعتبر است');
        }

        $cartItem = CartItem::find($cartItemId);

        if (!$cartItem) {
            return redirect()->route('cart.step1')->with('error', 'آیتم یافت نشد');
        }

        if ($cartItem->user_id !== auth()->id()) {
            return redirect()->route('cart.step1')->with('error', 'شما اجازه حذف این آیتم را ندارید');
        }

        $cartItem->delete();

        return redirect()->route('cart.step1')->with('success', 'آیتم با موفقیت حذف شد');
    }

    public function updateQuantity(Request $request, $cartItemId)
    {
        $cartItem = CartItem::findOrFail($cartItemId);

        // بروزرسانی تعداد و وزن
        $cartItem->quantity = intval($request->quantity);
        $cartItem->weight   = intval($request->weight);

        $unitPrice       = $cartItem->product->price;             // قیمت اصلی
        $discountedPrice = $cartItem->product->discountedPrice(); // قیمت بعد از تخفیف

        // محاسبه قیمت آیتم بر اساس وزن و تعداد
        $cartItem->original_price = $unitPrice * $cartItem->quantity * ($cartItem->weight / 500);
        $cartItem->final_price    = $discountedPrice * $cartItem->quantity * ($cartItem->weight / 500);

        $cartItem->save();

        // جمع کل سبد خرید و تخفیف کل فقط برای کاربر جاری
        $cartItems = CartItem::where('user_id', auth()->id())->get();

        $cartTotal    = $cartItems->sum('original_price'); // جمع کل بدون تخفیف
        $finalTotalItems = $cartItems->sum('final_price'); // جمع کل بعد از تخفیف
        $cartDiscount = $cartTotal - $finalTotalItems;     // تخفیف کل

        // هزینه ارسال ثابت
          if ($cartItems->count() > 0) {
                $shipping = $finalTotalItems >= 1000000 ? 0 : 50000;
        } else {
           $shipping =  0;
        }
   

        // مبلغ نهایی
        $finalTotal = $finalTotalItems + $shipping;

        // بازگشت JSON
        return response()->json([
            'success'       => true,
            'newSubtotal'   => number_format($cartItem->final_price),
            'discount'      => number_format($cartItem->original_price - $cartItem->final_price),
            'cartTotal'     => number_format($cartTotal),
            'cartDiscount'  => number_format($cartDiscount),
            'shipping'      => $shipping == 0 ? 'رایگان' : number_format($shipping) . ' تومان',
            'finalTotal'    => number_format($finalTotal),
        ]);
    }
}
