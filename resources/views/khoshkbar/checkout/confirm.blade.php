@extends('khoshkbar.layout.master')

@section('content')
    <!DOCTYPE html>
    <html lang="fa" dir="rtl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>خشکبار امجد - فروشگاه آنلاین</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            'primary-green': '#22C55E',
                            'dark-green': '#16A34A',
                            'light-green': '#DCFCE7',
                            'golden-yellow': '#FCD34D',
                            'warm-yellow': '#FEF3C7',
                            'soft-gray': '#F8FAFC'
                        },
                    }
                }
            }
        </script>
        <style>
            body {
                box-sizing: border-box;
            }

            .step-indicator {
                transition: all 0.3s ease;
            }

            .step-active {
                background: linear-gradient(135deg, #22C55E, #16A34A);
            }

            .step-completed {
                background: linear-gradient(135deg, #FCD34D, #F59E0B);
            }

            .product-card {
                transition: all 0.3s ease;
            }

            .product-card:hover {
                transform: translateY(-2px);
            }

            .quantity-btn {
                transition: all 0.2s ease;
            }

            .quantity-btn:hover {
                transform: scale(1.1);
            }
        </style>
    </head>

    <body class="bg-soft-gray min-h-screen">

        <!-- Step Indicator -->
        <div class="max-w-7xl mx-auto px-4 py-8">
            <div class="flex items-center justify-center space-x-8 space-x-reverse mb-8">
                <div class="flex items-center">
                    <div id="step1-indicator"
                        class="step-indicator step-completed w-12 h-12 rounded-full flex items-center justify-center text-white font-bold shadow-lg">
                        1
                    </div>
                    <span class="mr-3 text-sm font-medium text-gray-700">سبد خرید</span>

                </div>
                <div class="w-16 h-1 bg-gray-200 rounded-full"></div>
                <div class="flex items-center">
                    <div id="step2-indicator"
                        class="step-indicator step-completed w-12 h-12 rounded-full flex items-center justify-center text-white font-bold shadow-lg">
                        2
                    </div>
                    <span class="mr-3 text-sm font-medium text-gray-700">اطلاعات سفارش</span>
                </div>

                <div class="w-16 h-1 bg-gray-200 rounded-full"></div>
                <div class="flex items-center">
                    <div id="step3-indicator"
                        class="step-indicator step-active w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 font-bold">
                        3</div>
                    <span class="mr-3 text-sm font-medium text-gray-500">اتمام خرید</span>
                </div>
            </div>
        </div>

        <!-- Step 3: Order Complete -->
        <div class="max-w-5xl mx-auto px-4 pb-8">
            <div class="bg-white rounded-2xl shadow-lg p-8 text-center">

                <!-- وضعیت پرداخت -->
                <div
                    class="w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg
            @if ($order->status == 'paid') bg-gradient-to-br from-primary-green to-dark-green
            @elseif($order->status == 'failed') bg-gradient-to-br from-red-500 to-red-700
            @elseif($order->status == 'cancelled') bg-gradient-to-br from-yellow-400 to-yellow-600 @endif
        ">
                    <span class="text-white text-4xl">
                        @if ($order->status == 'paid')
                            ✓
                        @elseif($order->status == 'failed')
                            ✗
                        @elseif($order->status == 'cancelled')
                            !
                        @endif
                    </span>
                </div>

                <h2 class="text-3xl font-bold text-gray-800 mb-4">
                    @if ($order->status == 'paid')
                        🎉 پرداخت موفق!
                    @elseif($order->status == 'failed')
                        ❌ پرداخت ناموفق
                    @elseif($order->status == 'cancelled')
                        ⚠️ پرداخت لغو شد
                    @endif
                </h2>

                <p class="text-gray-600 mb-8 text-lg">
                    @if ($order->status == 'paid')
                        از خرید شما متشکریم. سفارش شما در اسرع وقت پردازش و ارسال خواهد شد.
                    @elseif($order->status == 'failed')
                        پرداخت با مشکل مواجه شد. لطفاً دوباره تلاش کنید یا با پشتیبانی تماس بگیرید.
                    @elseif($order->status == 'cancelled')
                        شما پرداخت را لغو کردید. اگر قصد خرید دارید دوباره اقدام کنید.
                    @endif
                </p>

                <!-- جزئیات سفارش -->
                <div class="bg-gradient-to-br from-light-green to-warm-yellow rounded-xl p-6 mb-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-right">
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-3 flex items-center">📋 جزئیات سفارش</h3>
                            <p class="text-sm text-gray-600 mb-1">شماره سفارش:
                                <span class="font-medium text-gray-800">{{ $order->order_number ?? $order->id }}</span>
                            </p>
                            <p class="text-sm text-gray-600 mb-1">تاریخ سفارش:
                                <span class="font-medium text-gray-800">{{ $order->created_at_jalali }}</span>
                            </p>
                            <p class="text-sm text-gray-600 mb-1">کد پیگیری پرداخت:
                                <span class="font-medium text-primary-green">{{ $order->ref_id ?? '---' }}</span>
                            </p>
                            <p class="text-sm text-gray-600">مبلغ کل:
                                <span class="font-medium text-primary-green">{{ number_format($order->total_price) }}
                                    تومان</span>
                            </p>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-3 flex items-center">🚚 اطلاعات ارسال</h3>
                            <p class="text-sm text-gray-600 mb-1">روش ارسال: <span class="font-medium text-gray-800">ارسال
                                    معمولی</span></p>
                            <p class="text-sm text-gray-600 mb-1">روش پرداخت: <span class="font-medium text-gray-800">پرداخت
                                    آنلاین</span></p>
                        </div>
                    </div>
                </div>

                <!-- خلاصه خرید -->
                <div class="bg-gray-50 rounded-xl p-6 mb-8">
                    <h3 class="font-semibold text-gray-800 mb-4 text-right flex items-center">🛒 خلاصه خرید</h3>
                    <div class="space-y-3 text-right">
                        @foreach ($order->items as $item)
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">{{ $item->product->name }} × {{ $item->quantity }} - ({{ $item->weight / 1000 }}کیلوگرم)</span>
                                <span class="font-medium">{{ number_format($item->total) }} تومان</span>
                            </div>
                        @endforeach
                        <hr class="border-gray-200">
                        <div class="flex justify-between items-center font-bold text-lg">
                            <span class="text-gray-800">مجموع:</span>
                            <span class="text-primary-green">{{ number_format($order->total_price) }} تومان</span>
                        </div>
                    </div>
                </div>

                <!-- دکمه‌ها -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('cart.step1') }}"
                        class="bg-gradient-to-r from-primary-green to-dark-green text-white font-bold py-4 px-8 rounded-xl hover:shadow-lg transition-all duration-300 text-lg">
                        ادامه خرید
                    </a>
                    <a href="{{ route('order.confirm', ['order' => $order->id, 'access_token' => $order->access_token]) }}"
                        class="border-2 border-primary-green text-primary-green font-bold py-4 px-8 rounded-xl hover:bg-primary-green hover:text-white transition-all duration-300 text-lg">
                        پیگیری سفارش
                    </a>
                </div>

            </div>
        </div>


        <script>
            document.getElementById('place-order').addEventListener('click', function() {
                document.querySelector('form').submit();
            });
            document.getElementById('province-select').addEventListener('change', function() {
                const selectedProvince = this.value;
                const citySelect = document.getElementById('city-select');

                // Clear previous cities
                citySelect.innerHTML = '<option value="">انتخاب شهر</option>';

                if (selectedProvince && cityData[selectedProvince]) {
                    citySelect.disabled = false;
                    cityData[selectedProvince].forEach(city => {
                        const option = document.createElement('option');
                        option.value = city;
                        option.textContent = city;
                        citySelect.appendChild(option);
                    });
                } else {
                    citySelect.disabled = true;
                    citySelect.innerHTML = '<option value="">ابتدا استان را انتخاب کنید</option>';
                }
            });
            const cityData = {
                tehran: ['تهران', 'ری', 'شمیرانات', 'اسلامشهر', 'ورامین', 'پاکدشت', 'دماوند', 'فیروزکوه'],
                isfahan: ['اصفهان', 'کاشان', 'نجف‌آباد', 'خمینی‌شهر', 'شاهین‌شهر', 'فولادشهر', 'مبارکه', 'نطنز'],
                shiraz: ['شیراز', 'مرودشت', 'کازرون', 'فسا', 'داراب', 'لار', 'فیروزآباد', 'جهرم'],
                mashhad: ['مشهد', 'نیشابور', 'سبزوار', 'تربت حیدریه', 'قوچان', 'کاشمر', 'تربت جام', 'چناران'],
                tabriz: ['تبریز', 'مراغه', 'میانه', 'مرند', 'شبستر', 'اهر', 'بناب', 'سراب'],
                ahvaz: ['اهواز', 'آبادان', 'خرمشهر', 'دزفول', 'اندیمشک', 'بهبهان', 'ماهشهر', 'شوشتر'],
                qom: ['قم', 'سلفچگان', 'دستجرد', 'کهک', 'جعفریه'],
                karaj: ['کرج', 'نظرآباد', 'فردیس', 'هشتگرد', 'ماهدشت', 'طالقان'],
                urmia: ['ارومیه', 'خوی', 'مهاباد', 'بوکان', 'میاندوآب', 'سلماس', 'نقده'],
                rasht: ['رشت', 'انزلی', 'لاهیجان', 'لنگرود', 'آستارا', 'تالش', 'فومن', 'صومعه سرا']
            };

            // Initialize cart totals
            updateCartTotals();
        </script>
        <script>
            (function() {
                function c() {
                    var b = a.contentDocument || a.contentWindow.document;
                    if (b) {
                        var d = b.createElement('script');
                        d.innerHTML =
                            "window.__CF$cv$params={r:'9851b69f0213bb61',t:'MTc1ODg3ODcyMC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
                        b.getElementsByTagName('head')[0].appendChild(d)
                    }
                }
                if (document.body) {
                    var a = document.createElement('iframe');
                    a.height = 1;
                    a.width = 1;
                    a.style.position = 'absolute';
                    a.style.top = 0;
                    a.style.left = 0;
                    a.style.border = 'none';
                    a.style.visibility = 'hidden';
                    document.body.appendChild(a);
                    if ('loading' !== document.readyState) c();
                    else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c);
                    else {
                        var e = document.onreadystatechange || function() {};
                        document.onreadystatechange = function(b) {
                            e(b);
                            'loading' !== document.readyState && (document.onreadystatechange = e, c())
                        }
                    }
                }
            })();
        </script>
    </body>

    </html>
@endsection
