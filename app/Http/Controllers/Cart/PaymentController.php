<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cartitem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pay(Request $request, $token)
    {
        $orderId = session('order_id');
        $order = Order::where('id', $orderId)
            ->where('payment_token', $token)
            ->first();
        $this->authorize('pay', $order);


        if (!$order) {
            return redirect()->route('cart.step2')->with('error', 'سفارش یافت نشد!');
        }

        $merchant = env('ZARINPAL_MERCHANT_ID');
        $sandbox  = filter_var(env('ZARINPAL_SANDBOX', true), FILTER_VALIDATE_BOOLEAN);
        $base     = $sandbox ? 'https://sandbox.zarinpal.com' : 'https://payment.zarinpal.com';

        $callbackUrl = route('payment.verify');

        // حتما عدد صحیح باشد
        $amount = intval($order->total_price);

        $response = Http::post("{$base}/pg/v4/payment/request.json", [
            'merchant_id'  => $merchant,
            'amount'       => $amount,
            'callback_url' => $callbackUrl,
            'description'  => "سفارش شماره {$order->id}",
            'metadata'     => [
                'email'  => $order->user->email ?? null,
                'mobile' => $order->phone,
            ],
        ]);

        $result = $response->json();

        if (isset($result['data']['authority'])) {
            $order->authority = $result['data']['authority'];
            $order->save();

            $startPayUrl = "{$base}/pg/StartPay/{$order->authority}";
            return redirect()->away($startPayUrl);
        }
    }


    // وریفای تراکنش
    public function verify(Request $request)
    {
        $orderId = session('order_id');
        $status  = $request->get('Status');
        $authority = $request->get('Authority');

        $order = Order::findOrFail($orderId);
        // $this->authorize('view', $order);
        if (!$order) {
            return redirect()->route('cart.step2')->with('error', 'سفارش یافت نشد!');
        }

        $merchant = env('ZARINPAL_MERCHANT_ID');
        $sandbox = filter_var(env('ZARINPAL_SANDBOX', true), FILTER_VALIDATE_BOOLEAN);
        $base = $sandbox ? 'https://sandbox.zarinpal.com' : 'https://payment.zarinpal.com';

        if ($status === 'OK') {
            $response = Http::post("{$base}/pg/v4/payment/verify.json", [
                'merchant_id' => $merchant,
                'amount'      => $order->total_price,
                'authority'   => $authority,
            ]);

            $data = $response->json();

            if (isset($data['data']['code']) && $data['data']['code'] == 100) {
                $order->status = 'paid';
                $order->ref_id = $data['data']['ref_id'] ?? null;
                $order->save();
                CartItem::where('user_id', $order->user_id)->delete();
                return redirect()->route('order.confirm', [
                    'order' => $order->id,
                    'access_token' => $order->access_token
                ])
                    ->with('success', 'پرداخت موفق — کد پیگیری: ' . $order->ref_id);
            }

            $order->status = 'failed';
            $order->save();
            return redirect()->route('order.confirm', [
                'order' => $order->id,
                'access_token' => $order->access_token
            ])
                ->with('error', 'پرداخت ناموفق: ' . json_encode($data));
        }

        $order->status = 'cancelled';
        $order->save();
        return redirect()->route('order.confirm', [
            'order' => $order->id,
            'access_token' => $order->access_token
        ])
            ->with('error', 'پرداخت لغو شد.');
    }
}
