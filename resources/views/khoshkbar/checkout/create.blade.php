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
                        fontFamily: {
                            'vazir': ['Vazir', 'sans-serif']
                        }
                    }
                }
            }
        </script>
        <link href="https://fonts.googleapis.com/css2?family=Vazir:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <style>
            body {
                box-sizing: border-box;
                font-family: 'Vazir', sans-serif;
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
                        class="step-indicator step-active w-12 h-12 rounded-full flex items-center justify-center text-white font-bold shadow-lg">
                        2
                    </div>
                    <span class="mr-3 text-sm font-medium text-gray-700">اطلاعات سفارش</span>
                </div>

                <div class="w-16 h-1 bg-gray-200 rounded-full"></div>
                <div class="flex items-center">
                    <div id="step3-indicator"
                        class="step-indicator w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 font-bold">
                        3</div>
                    <span class="mr-3 text-sm font-medium text-gray-500">اتمام خرید</span>
                </div>
            </div>
        </div>


        <!-- Step 2: Order Information -->
        <div id="step2" class="max-w-7xl mx-auto px-4 pb-8 ">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Customer Information Form -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                            📝 اطلاعات سفارش
                        </h2>

                        <form method="POST" action="{{ route('cart.placeOrder') }}" id="checkout-form">
                            @csrf
                            <!-- Customer Details -->
                            <div class="mb-8">
                                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                    👤 اطلاعات شخصی
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">نام و نام خانوادگی
                                            *</label>
                                        <input type="text" name="fullname" required
                                            class="w-full border border-gray-200 rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary-green focus:border-transparent"
                                            placeholder="نام و نام خانوادگی خود را وارد کنید">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">شماره تلفن *</label>
                                        <input name="phone" type="tel" required
                                            class="w-full border border-gray-200 rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary-green focus:border-transparent"
                                            placeholder="09123456789">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">استان *</label>
                                        <select name="province" required
                                            class="w-full border border-gray-200 rounded-lg px-4 py-3 focus:ring-2 focus:ring-forest-green focus:border-transparent"
                                            id="province-select">
                                            <option value="">انتخاب استان</option>
                                            <option value="tehran">تهران</option>
                                            <option value="isfahan">اصفهان</option>
                                            <option value="shiraz">شیراز</option>
                                            <option value="mashhad">مشهد</option>
                                            <option value="tabriz">تبریز</option>
                                            <option value="ahvaz">اهواز</option>
                                            <option value="qom">قم</option>
                                            <option value="karaj">کرج</option>
                                            <option value="urmia">ارومیه</option>
                                            <option value="rasht">رشت</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">شهر *</label>
                                        <select name="city" required
                                            class="w-full border border-gray-200 rounded-lg px-4 py-3 focus:ring-2 focus:ring-forest-green focus:border-transparent"
                                            id="city-select" disabled>
                                            <option value="">ابتدا استان را انتخاب کنید</option>
                                        </select>
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">آدرس *</label>
                                        <textarea name="address" required
                                            class="w-full border border-gray-200 rounded-lg px-4 py-3 focus:ring-2 focus:ring-forest-green focus:border-transparent"
                                            rows="3" placeholder="آدرس کامل خود را وارد کنید"></textarea>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">پلاک *</label>
                                        <input name="plaque" type="text" required
                                            class="w-full border border-gray-200 rounded-lg px-4 py-3 focus:ring-2 focus:ring-forest-green focus:border-transparent"
                                            placeholder="شماره پلاک">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">واحد</label>
                                        <input name="unit" type="text"
                                            class="w-full border border-gray-200 rounded-lg px-4 py-3 focus:ring-2 focus:ring-forest-green focus:border-transparent"
                                            placeholder="شماره واحد (اختیاری)">
                                    </div>



                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">کد پستی *</label>
                                        <input name="postal_code" type="text" required
                                            class="w-full border border-gray-200 rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary-green focus:border-transparent"
                                            placeholder="1234567890" maxlength="10">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">توضیحات تکمیلی</label>
                                        <textarea name="description"
                                            class="w-full border border-gray-200 rounded-lg px-4 py-3 focus:ring-2 focus:ring-forest-green focus:border-transparent"
                                            rows="2" placeholder="توضیحات اضافی برای تحویل سفارش (اختیاری)"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-gradient-to-br from-light-green to-white rounded-2xl shadow-lg p-6 sticky top-4">
                        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                            📋 خلاصه سفارش
                        </h3>

                        <div class="space-y-3 mb-6">
                            <div class="text-sm bg-white rounded-lg p-3">
                                @foreach ($cartItems as $item)
                                    <div class="flex justify-between items-center py-2">
                                        <span class="text-gray-600">
                                            {{ $item->product->name }} ({{ $item->weight / 1000 }}کیلوگرم) ×
                                            {{ $item->quantity }}
                                        </span>
                                        <span class="font-medium">
                                            {{ number_format($item->original_price) }} تومان
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                            <hr class="border-gray-200">

                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">جمع کل:</span>
                                <span class="font-bold text-lg" id="cart-total">{{ number_format($cartTotal) }}
                                    تومان</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">هزینه ارسال:</span>
                                <span class="font-medium text-primary-green" id="shipping-cost">
                                    {{ $shipping == 0 ? 'رایگان' : number_format($shipping) . ' تومان' }}
                                </span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">تخفیف: </span>
                                <span class="font-medium text-golden-yellow"
                                    id="cart-discount">{{ number_format($cartDiscount) }} تومان</span>
                            </div>
                            <hr class="border-gray-200">
                            <div class="flex justify-between items-center text-xl font-bold">
                                <span class="text-gray-800">مبلغ نهایی:</span>
                                <span class="text-primary-green" id="cart-payable">{{ number_format($finalTotal) }}
                                    تومان</span>
                            </div>
                        </div>

                        <button type="submit" id="place-order"
                            class="w-full bg-gradient-to-r from-primary-green to-dark-green text-white font-bold py-4 px-6 rounded-xl hover:shadow-lg transition-all duration-300 text-lg">
                            ثبت سفارش
                        </button>
                    </div>
                </div>
            </div>
        </div>



        <script>
            document.getElementById('place-order').addEventListener('click', function() {
                document.getElementById('checkout-form').submit();
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
        <script>
            // افزایش/کاهش تعداد
            function updateQuantity(cartItemId, change) {
                let quantityInput = document.getElementById('quantity' + cartItemId);
                let weightSelect = document.getElementById('weight-select-' + cartItemId);
                let quantity = parseInt(quantityInput.value) + change;
                if (quantity < 1) quantity = 1;
                quantityInput.value = quantity;

                let weight = parseInt(weightSelect.value) || 500;

                updateCartItem(cartItemId, quantity, weight);
            }

            // تغییر وزن
            function updateWeight(cartItemId, newWeight) {
                let quantityInput = document.getElementById('quantity' + cartItemId);
                let quantity = parseInt(quantityInput.value) || 1;

                updateCartItem(cartItemId, quantity, parseInt(newWeight));
            }

            // تابع مشترک بروزرسانی آیتم
            function updateCartItem(cartItemId, quantity, weight) {
                fetch(`/cart/update/${cartItemId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            quantity,
                            weight
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            // subtotal آیتم
                            let subtotalEl = document.querySelector(`#cart-item-${cartItemId} .product-subtotal`);
                            if (subtotalEl) subtotalEl.innerText = data.newSubtotal + " تومان";

                            // تخفیف آیتم
                            let discountEl = document.querySelector(`#cart-item-${cartItemId} .product-discount`);
                            if (discountEl) discountEl.innerText = data.discount + " تومان";

                            // جمع کل بدون تخفیف
                            let cartTotalEl = document.getElementById('cart-total');
                            if (cartTotalEl) cartTotalEl.innerText = data.cartTotal + " تومان";

                            // تخفیف کل
                            let cartDiscountEl = document.getElementById('cart-discount');
                            if (cartDiscountEl) cartDiscountEl.innerText = data.cartDiscount + " تومان";

                            // هزینه ارسال
                            let shippingEl = document.getElementById('shipping-cost');
                            if (shippingEl) shippingEl.innerText = data.shipping;

                            // مبلغ نهایی
                            let finalTotalEl = document.getElementById('cart-payable');
                            if (finalTotalEl) finalTotalEl.innerText = data.finalTotal + " تومان";
                        }
                    })
                    .catch(err => console.error('AJAX updateCartItem error:', err));
            }
        </script>

    </body>

    </html>
@endsection
