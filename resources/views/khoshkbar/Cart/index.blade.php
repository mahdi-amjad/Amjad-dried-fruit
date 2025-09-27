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
                        class="step-indicator step-active w-12 h-12 rounded-full flex items-center justify-center text-white font-bold shadow-lg">
                        1</div>
                    <span class="mr-3 text-sm font-medium text-gray-700">سبد خرید</span>
                </div>
                <div class="w-16 h-1 bg-gray-200 rounded-full"></div>
                <div class="flex items-center">
                    <div id="step2-indicator"
                        class="step-indicator w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 font-bold">
                        2</div>
                    <span class="mr-3 text-sm font-medium text-gray-500">اطلاعات سفارش</span>
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

        <!-- Step 1: Shopping Cart -->
        <div id="step1" class="max-w-7xl mx-auto px-4 pb-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Cart Items -->
                <div class="lg:col-span-3">
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                            🛒 سبد خرید شما
                            <span class="mr-3 text-sm bg-primary-green text-white px-3 py-1 rounded-full">
                                {{ $cartItems->count() }} محصول</span>
                        </h2>

                        @if ($cartItems->count() > 0)
                            @foreach ($cartItems as $item)
                                <div class="cart-item clearfix cart-campaign" id="cart-item-{{ $item->id }}">
                                    <div class="column remove">
                                        <span class="remove-from-cart " data-title="حذف">
                                            <label for="remove_input_{{ $item->id }}" class="td-title">
                                                <form action="{{ route('cart.remove', $item->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-del">
                                                        <img src="{{ asset('Assets/images/cancel.svg') }}" width="10">
                                                    </button>
                                                </form>

                                            </label>
                                        </span>
                                    </div>





                                    <div class="column product-image">
                                        <a href="#" class="img-sale">
                                            <img src="{{ asset('AdminAssets.Product-image/' . $item->product->image) }}"
                                                alt="{{ $item->product->name }}" class="img-fluid">
                                        </a>
                                    </div>

                                    <div class="content-products">
                                        <div class="column product-title">
                                            <div class="product-cart">
                                                <a href="#">{{ $item->product->name }}</a>
                                            </div>
                                        </div>
                                        <div class="column count" style="margin-left: 15px;">
                                            <select id="weight-select-{{ $item->id }}" class="form-select"
                                                aria-label="Default select example" name="weight"
                                                onchange="updateWeight({{ $item->id }}, this.value)">
                                                <option value="500" {{ $item->weight == 500 ? 'selected' : '' }}>500
                                                    گرم
                                                </option>
                                                <option value="1000" {{ $item->weight == 1000 ? 'selected' : '' }}>1
                                                    کیلوگرم</option>
                                                <option value="5000" {{ $item->weight == 5000 ? 'selected' : '' }}>5
                                                    کیلوگرم</option>
                                            </select>
                                        </div>
                                        <div class="column count">
                                            <div class="quantity">
                                                <div class="quantity-up" onclick="updateQuantity({{ $item->id }}, 1)">
                                                    <img src="{{ asset('Assets/images/plus.svg') }}" width="12px">
                                                </div>
                                                <input type="text" name="quantity[]" value="{{ $item->quantity }}"
                                                    min="1" id="quantity{{ $item->id }}"
                                                    class="form-control quantity-val" step="1">
                                                <div class="quantity-down"
                                                    onclick="updateQuantity({{ $item->id }}, -1)">
                                                    <i class="fas fa-minus"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="column price">
                                            <span class="subtotal">
                                                <span
                                                    class="product-subtotal">{{ number_format($cartTotal) }}
                                                    تومان</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="empty-cart text-center">
                                <div class="cart-illustration bounce-in mb-8">
                                    <svg width="200" height="200" viewBox="0 0 200 200" class="mx-auto">
                                        <defs>
                                            <linearGradient id="cartGradient" x1="0%" y1="0%" x2="100%"
                                                y2="100%">
                                                <stop offset="0%" style="stop-color:#fbbf24;stop-opacity:1" />
                                                <stop offset="100%" style="stop-color:#22c55e;stop-opacity:1" />
                                            </linearGradient>
                                            <linearGradient id="shadowGradient" x1="0%" y1="0%"
                                                x2="100%" y2="100%">
                                                <stop offset="0%" style="stop-color:#000000;stop-opacity:0.1" />
                                                <stop offset="100%" style="stop-color:#000000;stop-opacity:0" />
                                            </linearGradient>
                                        </defs>

                                        <ellipse cx="100" cy="180" rx="60" ry="8"
                                            fill="url(#shadowGradient)" />

                                        <path d="M40 60 L160 60 L150 140 L50 140 Z" fill="url(#cartGradient)"
                                            stroke="#16a34a" stroke-width="2" rx="5" />

                                        <path d="M35 60 L35 50 Q35 40 45 40 L155 40 Q165 40 165 50 L165 60" fill="none"
                                            stroke="#16a34a" stroke-width="3" stroke-linecap="round" />

                                        <circle cx="70" cy="155" r="12" fill="#fbbf24" stroke="#f59e0b"
                                            stroke-width="2" />
                                        <circle cx="130" cy="155" r="12" fill="#fbbf24" stroke="#f59e0b"
                                            stroke-width="2" />

                                        <circle cx="70" cy="155" r="6" fill="#f59e0b" />
                                        <circle cx="130" cy="155" r="6" fill="#f59e0b" />

                                        <line x1="60" y1="80" x2="140" y2="80"
                                            stroke="#16a34a" stroke-width="1" opacity="0.3" stroke-dasharray="5,5" />
                                        <line x1="65" y1="100" x2="135" y2="100"
                                            stroke="#16a34a" stroke-width="1" opacity="0.3" stroke-dasharray="5,5" />
                                        <line x1="70" y1="120" x2="130" y2="120"
                                            stroke="#16a34a" stroke-width="1" opacity="0.3" stroke-dasharray="5,5" />

                                        <circle cx="30" cy="30" r="3" fill="#fbbf24" opacity="0.6">
                                            <animate attributeName="cy" values="30;25;30" dur="2s"
                                                repeatCount="indefinite" />
                                        </circle>
                                        <circle cx="170" cy="40" r="2" fill="#22c55e" opacity="0.6">
                                            <animate attributeName="cy" values="40;35;40" dur="2.5s"
                                                repeatCount="indefinite" />
                                        </circle>
                                        <circle cx="20" cy="80" r="2.5" fill="#fbbf24" opacity="0.4">
                                            <animate attributeName="cy" values="80;75;80" dur="3s"
                                                repeatCount="indefinite" />
                                        </circle>
                                    </svg>
                                </div>
                                <div class="fade-in mb-6" style="animation-delay: 0.3s;">
                                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                                        سبد خرید شما خالی است
                                    </h1>
                                    <p class="text-lg text-gray-600 leading-relaxed">
                                        برای شروع خرید، به صفحه محصولات بروید
                                    </p>
                                </div>
                            </div>
                        @endif



                    </div>
                </div>

                <!-- Order Summary -->

                <div class="lg:col-span-1">
                  <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-4">
    <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
        📋 خلاصه سفارش
    </h3>

    <div class="space-y-4 mb-6">
        <div class="flex justify-between items-center">
            <span class="text-gray-600">جمع کل:</span>
            <span class="font-bold text-lg" id="cart-total">{{ number_format($cartTotal) }} تومان</span>
        </div>
        <div class="flex justify-between items-center">
            <span class="text-gray-600">هزینه ارسال:</span>
            <span class="font-medium text-primary-green" id="shipping-cost">
                {{ $shipping == 0 ? 'رایگان' : number_format($shipping) . ' تومان' }}
            </span>
        </div>
        <div class="flex justify-between items-center">
            <span class="text-gray-600">تخفیف: </span>
            <span class="font-medium text-golden-yellow" id="cart-discount">{{ number_format($cartDiscount) }} تومان</span>
        </div>
        <hr class="border-gray-200">
        <div class="flex justify-between items-center text-xl font-bold">
            <span class="text-gray-800">مبلغ نهایی:</span>
            <span class="text-primary-green" id="cart-payable">{{ number_format($finalTotal) }} تومان</span>
        </div>
    </div>

    <button id="proceed-checkout"
        class="w-full bg-gradient-to-r from-primary-green to-dark-green text-white font-bold py-4 px-6 rounded-xl hover:shadow-lg transition-all duration-300 text-lg">
        تایید و ادامه فرآیند خرید
    </button>

    <div class="mt-4 text-center">
        <p class="text-sm text-gray-500">🔒 پرداخت امن تضمین شده</p>
    </div>
</div>

                </div>
            </div>
        </div>

        <!-- Step 2: Order Information -->
        <div id="step2" class="max-w-7xl mx-auto px-4 pb-8 hidden">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Customer Information Form -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                            📝 اطلاعات سفارش
                        </h2>

                        <form id="checkout-form">
                            <!-- Customer Details -->
                            <div class="mb-8">
                                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                    👤 اطلاعات شخصی
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">نام *</label>
                                        <input type="text" required
                                            class="w-full border border-gray-200 rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary-green focus:border-transparent"
                                            placeholder="نام خود را وارد کنید">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">نام خانوادگی *</label>
                                        <input type="text" required
                                            class="w-full border border-gray-200 rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary-green focus:border-transparent"
                                            placeholder="نام خانوادگی خود را وارد کنید">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">استان *</label>
                                        <select required
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
                                        <select required
                                            class="w-full border border-gray-200 rounded-lg px-4 py-3 focus:ring-2 focus:ring-forest-green focus:border-transparent"
                                            id="city-select" disabled>
                                            <option value="">ابتدا استان را انتخاب کنید</option>
                                        </select>
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">آدرس *</label>
                                        <textarea required
                                            class="w-full border border-gray-200 rounded-lg px-4 py-3 focus:ring-2 focus:ring-forest-green focus:border-transparent"
                                            rows="3" placeholder="آدرس کامل خود را وارد کنید"></textarea>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">پلاک *</label>
                                        <input type="text" required
                                            class="w-full border border-gray-200 rounded-lg px-4 py-3 focus:ring-2 focus:ring-forest-green focus:border-transparent"
                                            placeholder="شماره پلاک">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">واحد</label>
                                        <input type="text"
                                            class="w-full border border-gray-200 rounded-lg px-4 py-3 focus:ring-2 focus:ring-forest-green focus:border-transparent"
                                            placeholder="شماره واحد (اختیاری)">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">شماره تلفن *</label>
                                        <input type="tel" required
                                            class="w-full border border-gray-200 rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary-green focus:border-transparent"
                                            placeholder="09123456789">
                                    </div>


                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">کد پستی *</label>
                                        <input type="text" required
                                            class="w-full border border-gray-200 rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary-green focus:border-transparent"
                                            placeholder="1234567890" maxlength="10">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">توضیحات تکمیلی</label>
                                        <textarea
                                            class="w-full border border-gray-200 rounded-lg px-4 py-3 focus:ring-2 focus:ring-forest-green focus:border-transparent"
                                            rows="2" placeholder="توضیحات اضافی برای تحویل سفارش (اختیاری)"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Delivery Method -->
                            <div class="mb-8">
                                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                    🚚 روش ارسال
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <label class="delivery-option cursor-pointer">
                                        <input type="radio" name="delivery" value="standard" class="sr-only" checked>
                                        <div
                                            class="border-2 border-gray-200 rounded-xl p-4 hover:border-primary-green transition-colors">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center space-x-3 space-x-reverse">
                                                    <div
                                                        class="w-10 h-10 bg-primary-green rounded-full flex items-center justify-center text-white">
                                                        🚛</div>
                                                    <div>
                                                        <h4 class="font-semibold text-gray-800">ارسال معمولی</h4>
                                                        <p class="text-sm text-gray-500">3-5 روز کاری</p>
                                                    </div>
                                                </div>
                                                <div class="text-primary-green font-bold">رایگان</div>
                                            </div>
                                        </div>
                                    </label>
                                    <label class="delivery-option cursor-pointer">
                                        <input type="radio" name="delivery" value="express" class="sr-only">
                                        <div
                                            class="border-2 border-gray-200 rounded-xl p-4 hover:border-primary-green transition-colors">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center space-x-3 space-x-reverse">
                                                    <div
                                                        class="w-10 h-10 bg-golden-yellow rounded-full flex items-center justify-center text-white">
                                                        ⚡</div>
                                                    <div>
                                                        <h4 class="font-semibold text-gray-800">ارسال سریع</h4>
                                                        <p class="text-sm text-gray-500">1-2 روز کاری</p>
                                                    </div>
                                                </div>
                                                <div class="text-golden-yellow font-bold">50,000 تومان</div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <!-- Payment Method -->
                            <div class="mb-8">
                                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                    💳 روش پرداخت
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <label class="payment-option cursor-pointer">
                                        <input type="radio" name="payment" value="online" class="sr-only" checked>
                                        <div
                                            class="border-2 border-gray-200 rounded-xl p-4 hover:border-primary-green transition-colors">
                                            <div class="flex items-center space-x-3 space-x-reverse">
                                                <div
                                                    class="w-10 h-10 bg-gradient-to-br from-primary-green to-dark-green rounded-full flex items-center justify-center text-white">
                                                    💳</div>
                                                <div>
                                                    <h4 class="font-semibold text-gray-800">پرداخت آنلاین</h4>
                                                    <p class="text-sm text-gray-500">کارت بانکی / اینترنت بانک</p>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                    <label class="payment-option cursor-pointer">
                                        <input type="radio" name="payment" value="cod" class="sr-only">
                                        <div
                                            class="border-2 border-gray-200 rounded-xl p-4 hover:border-primary-green transition-colors">
                                            <div class="flex items-center space-x-3 space-x-reverse">
                                                <div
                                                    class="w-10 h-10 bg-gradient-to-br from-golden-yellow to-yellow-600 rounded-full flex items-center justify-center text-white">
                                                    💰</div>
                                                <div>
                                                    <h4 class="font-semibold text-gray-800">پرداخت در محل</h4>
                                                    <p class="text-sm text-gray-500">پرداخت هنگام تحویل</p>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
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
                                <div class="flex justify-between items-center py-2">
                                    <span class="text-gray-600">مخلوط آجیل درجه یک (1kg) × 2</span>
                                    <span class="font-medium">460,000 تومان</span>
                                </div>
                                <div class="flex justify-between items-center py-2">
                                    <span class="text-gray-600">میوه خشک ارگانیک (500g) × 1</span>
                                    <span class="font-medium">95,000 تومان</span>
                                </div>
                                <div class="flex justify-between items-center py-2">
                                    <span class="text-gray-600">شاه بلوط برشته (500g) × 3</span>
                                    <span class="font-medium">225,000 تومان</span>
                                </div>
                            </div>
                            <hr class="border-gray-200">
                            <div class="flex justify-between">
                                <span class="text-gray-600">جمع کل:</span>
                                <span class="font-medium">780,000 تومان</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">هزینه ارسال:</span>
                                <span class="font-medium text-primary-green" id="shipping-cost">رایگان</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">تخفیف:</span>
                                <span class="font-medium text-golden-yellow">-50,000 تومان</span>
                            </div>
                            <hr class="border-gray-200">
                            <div class="flex justify-between text-lg font-bold">
                                <span class="text-gray-800">مبلغ نهایی:</span>
                                <span class="text-primary-green" id="final-total">730,000 تومان</span>
                            </div>
                        </div>

                        <button id="place-order"
                            class="w-full bg-gradient-to-r from-primary-green to-dark-green text-white font-bold py-4 px-6 rounded-xl hover:shadow-lg transition-all duration-300 text-lg">
                            ثبت سفارش
                        </button>
                    </div>
                </div>
            </div>
        </div>



        <script>
            // Cart functionality
            let cartData = {
                1: {
                    quantity: 2,
                    weight: 1000,
                    price: 230000,
                    name: "مخلوط آجیل درجه یک"
                },
                2: {
                    quantity: 1,
                    weight: 500,
                    price: 95000,
                    name: "میوه خشک ارگانیک"
                },
                3: {
                    quantity: 3,
                    weight: 500,
                    price: 75000,
                    name: "شاه بلوط برشته"
                }
            };

            function formatPrice(price) {
                return price.toLocaleString('fa-IR') + ' تومان';
            }

            function updateCartTotals() {
                let subtotal = 0;
                let itemCount = 0;

                Object.keys(cartData).forEach(productId => {
                    const item = cartData[productId];
                    const total = item.quantity * item.price;
                    subtotal += total;
                    itemCount += item.quantity;

                    const totalElement = document.querySelector(`[data-product="${productId}"].product-total`);
                    if (totalElement) {
                        totalElement.textContent = formatPrice(total);
                    }
                });

                const discount = 50000;
                const finalTotal = subtotal - discount;

                document.getElementById('subtotal').textContent = formatPrice(subtotal);
                document.getElementById('total').textContent = formatPrice(finalTotal);
                document.getElementById('final-total').textContent = formatPrice(finalTotal);
                document.getElementById('cart-count').textContent = `${itemCount} محصول`;
            }

            // Quantity buttons
            document.querySelectorAll('.quantity-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const productId = this.dataset.product;
                    const action = this.dataset.action;
                    const quantityDisplay = document.querySelector(
                        `[data-product="${productId}"].quantity-display`);

                    let currentQuantity = parseInt(quantityDisplay.textContent);

                    if (action === 'increase') {
                        currentQuantity++;
                    } else if (action === 'decrease' && currentQuantity > 1) {
                        currentQuantity--;
                    }

                    cartData[productId].quantity = currentQuantity;
                    quantityDisplay.textContent = currentQuantity;
                    updateCartTotals();
                });
            });

            // Weight selectors
            document.querySelectorAll('.weight-selector').forEach(select => {
                select.addEventListener('change', function() {
                    const productId = this.dataset.product;
                    const selectedOption = this.options[this.selectedIndex];
                    const newPrice = parseInt(selectedOption.dataset.price);

                    cartData[productId].price = newPrice;
                    cartData[productId].weight = parseInt(this.value);

                    updateCartTotals();
                });
            });

            // Remove buttons
            document.querySelectorAll('.remove-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const productId = this.dataset.product;
                    const productRow = this.closest('.product-card');

                    delete cartData[productId];
                    productRow.remove();
                    updateCartTotals();
                });
            });

            document.getElementById('proceed-checkout').addEventListener('click', function() {
                let cartItemsCount = {{ $cartItems->count() }};
                if (cartItemsCount > 0) {
                    window.location.href = "{{ route('cart.step2') }}"; // به مرحله بعد میره
                } else {
                    alert("سبد خرید شما خالی است!");
                }
            });




            // Delivery method selection
            document.querySelectorAll('input[name="delivery"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    document.querySelectorAll('.delivery-option div').forEach(div => {
                        div.classList.remove('border-primary-green', 'bg-light-green');
                        div.classList.add('border-gray-200');
                    });

                    const selectedDiv = this.closest('.delivery-option').querySelector('div');
                    selectedDiv.classList.add('border-primary-green', 'bg-light-green');
                    selectedDiv.classList.remove('border-gray-200');

                    // Update shipping cost
                    const shippingCost = this.value === 'express' ? '50,000 تومان' : 'رایگان';
                    document.getElementById('shipping-cost').textContent = shippingCost;

                    const currentTotal = this.value === 'express' ? 780000 : 730000;
                    document.getElementById('final-total').textContent = formatPrice(currentTotal);
                });
            });

            // Payment method selection
            document.querySelectorAll('input[name="payment"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    document.querySelectorAll('.payment-option div').forEach(div => {
                        div.classList.remove('border-primary-green', 'bg-light-green');
                        div.classList.add('border-gray-200');
                    });

                    const selectedDiv = this.closest('.payment-option').querySelector('div');
                    selectedDiv.classList.add('border-primary-green', 'bg-light-green');
                    selectedDiv.classList.remove('border-gray-200');
                });
            });

            // Place order
            document.getElementById('place-order').addEventListener('click', function(e) {
                e.preventDefault();

                const form = document.getElementById('checkout-form');
                if (form.checkValidity()) {
                    document.getElementById('step2').classList.add('hidden');
                    document.getElementById('step3').classList.remove('hidden');

                    // Update step indicators
                    document.getElementById('step2-indicator').classList.remove('step-active');
                    document.getElementById('step2-indicator').classList.add('step-completed');
                    document.getElementById('step3-indicator').classList.add('step-active');
                    document.getElementById('step3-indicator').classList.remove('bg-gray-200', 'text-gray-500');
                    document.getElementById('step3-indicator').nextElementSibling.classList.remove('text-gray-500');
                    document.getElementById('step3-indicator').nextElementSibling.classList.add('text-gray-700');

                    // Set order completion details
                    const today = new Date();
                    const persianDate = today.toLocaleDateString('fa-IR');
                    document.getElementById('order-date').textContent = persianDate;

                    const deliveryDate = new Date();
                    const selectedDelivery = document.querySelector('input[name="delivery"]:checked').value;
                    deliveryDate.setDate(today.getDate() + (selectedDelivery === 'express' ? 2 : 5));
                    document.getElementById('delivery-date').textContent = deliveryDate.toLocaleDateString('fa-IR');

                    document.getElementById('delivery-method').textContent = selectedDelivery === 'express' ?
                        'ارسال سریع' : 'ارسال معمولی';

                    const selectedPayment = document.querySelector('input[name="payment"]:checked').value;
                    document.getElementById('payment-method').textContent = selectedPayment === 'online' ?
                        'پرداخت آنلاین' : 'پرداخت در محل';

                    // Generate random order number
                    const orderNum = Math.floor(Math.random() * 900000) + 100000;
                    document.getElementById('order-number').textContent = `#KA-1403-${orderNum}`;
                } else {
                    form.reportValidity();
                }
            });

            // Continue shopping
            document.getElementById('continue-shopping').addEventListener('click', function() {
                // Reset to step 1
                document.getElementById('step3').classList.add('hidden');
                document.getElementById('step1').classList.remove('hidden');

                // Reset step indicators
                document.getElementById('step1-indicator').classList.add('step-active');
                document.getElementById('step1-indicator').classList.remove('step-completed');
                document.getElementById('step2-indicator').classList.remove('step-completed', 'step-active');
                document.getElementById('step2-indicator').classList.add('bg-gray-200', 'text-gray-500');
                document.getElementById('step3-indicator').classList.remove('step-active');
                document.getElementById('step3-indicator').classList.add('bg-gray-200', 'text-gray-500');

                // Reset form
                document.getElementById('checkout-form').reset();
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
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

        <script>
            function removeFromCart(cartItemId) {
                // ارسال درخواست حذف به سرور با استفاده از fetch
                fetch(`/cart/remove/${cartItemId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // در صورتی که حذف موفقیت‌آمیز بود، آیتم از صفحه حذف می‌شود
                            let cartItemElement = document.getElementById('cart-item-' + cartItemId);
                            if (cartItemElement) {
                                cartItemElement.remove();
                            }
                        } else {
                            alert('Error removing item');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
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
            body: JSON.stringify({ quantity, weight })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                // subtotal آیتم
                let subtotalEl = document.querySelector(`#cart-item-${cartItemId} .product-subtotal`);
                if(subtotalEl) subtotalEl.innerText = data.newSubtotal + " تومان";

                // تخفیف آیتم
                let discountEl = document.querySelector(`#cart-item-${cartItemId} .product-discount`);
                if(discountEl) discountEl.innerText = data.discount + " تومان";

                // جمع کل بدون تخفیف
                let cartTotalEl = document.getElementById('cart-total');
                if(cartTotalEl) cartTotalEl.innerText = data.cartTotal + " تومان";

                // تخفیف کل
                let cartDiscountEl = document.getElementById('cart-discount');
                if(cartDiscountEl) cartDiscountEl.innerText = data.cartDiscount + " تومان";

                // هزینه ارسال
                let shippingEl = document.getElementById('shipping-cost');
                if(shippingEl) shippingEl.innerText = data.shipping;

                // مبلغ نهایی
                let finalTotalEl = document.getElementById('cart-payable');
                if(finalTotalEl) finalTotalEl.innerText = data.finalTotal + " تومان";
            }
        })
        .catch(err => console.error('AJAX updateCartItem error:', err));
    }
</script>


    </body>

    </html>

@endsection
