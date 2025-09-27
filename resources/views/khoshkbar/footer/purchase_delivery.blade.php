@extends('khoshkbar.layout.master')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .step-card {
            transition: all 0.3s ease;
        }
        .step-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }
        .step-number {
            background: linear-gradient(135deg, #22C55E, #EAB308);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .highlight-text {
            background: linear-gradient(120deg, rgba(34, 197, 94, 0.1) 0%, rgba(234, 179, 8, 0.1) 100%);
            padding: 2px 8px;
            border-radius: 6px;
            border-right: 4px solid #22C55E;
        }
        .fade-in {
            animation: fadeIn 0.8s ease-in;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .text-shadow {
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
    </style>
<body class="bg-white min-h-screen">
    <!-- Main Container -->
    <div class="max-w-5xl mx-auto px-4 py-16">
        <!-- Header Section -->
        <div class="text-center mb-16 fade-in">
            <h1 class="text-5xl md:text-6xl font-bold text-green-800 mb-6 text-shadow">
                چطور از خشکبار امجد خرید کنیم؟
            </h1>
            <div class="w-32 h-1 bg-gradient-to-r from-green-500 to-yellow-500 mx-auto rounded-full mb-8"></div>
            <p class="text-xl md:text-2xl text-gray-700 font-medium max-w-3xl mx-auto leading-relaxed">
                با سه قدم آسان، بهترین محصولات خشکبار را در خانه خود دریافت کنید
            </p>
        </div>

        <!-- Main Title -->
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                روش‌های خرید و ارسال
            </h2>
            <p class="text-lg text-gray-600 font-medium">
                فرآیند ساده و مطمئن برای دریافت محصولات باکیفیت امجد
            </p>
        </div>

        <!-- Steps Container -->
        <div class="space-y-8 md:space-y-12">
            <!-- Step 1: Easy Order -->
            <div class="step-card bg-white rounded-3xl p-8 md:p-12 shadow-lg border border-gray-100 fade-in">
                <div class="flex flex-col md:flex-row items-start md:items-center">
                    <!-- Step Number -->
                    <div class="flex-shrink-0 mb-6 md:mb-0 md:ml-8">
                        <div class="w-20 h-20 md:w-24 md:h-24 rounded-full bg-gradient-to-br from-green-100 to-yellow-100 flex items-center justify-center">
                            <span class="text-4xl md:text-5xl font-bold step-number">۱</span>
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="flex-1">
                        <h3 class="text-3xl md:text-4xl font-bold text-green-800 mb-4">
                            سفارش آسان
                        </h3>
                        <div class="highlight-text mb-6">
                            <p class="text-lg md:text-xl text-gray-700 font-medium">
                                راه‌های مختلف برای ثبت سفارش شما
                            </p>
                        </div>
                        <p class="text-lg md:text-xl text-gray-700 leading-relaxed mb-6">
                            مشتریان عزیز می‌توانند از طریق <span class="font-semibold text-green-700">تماس تلفنی</span>، 
                            <span class="font-semibold text-yellow-600">ارسال پیامک</span> یا 
                            <span class="font-semibold text-green-700">سفارش آنلاین</span> 
                            محصولات مورد نظر خود را به راحتی انتخاب و ثبت کنند.
                        </p>
                        <div class="grid md:grid-cols-3 gap-4">
                            <div class="bg-green-50 rounded-xl p-4 text-center">
                                <p class="font-semibold text-green-800">تماس تلفنی</p>
                                <p class="text-sm text-green-600 mt-1">۲۴ ساعته پاسخگو</p>
                            </div>
                            <div class="bg-yellow-50 rounded-xl p-4 text-center">
                                <p class="font-semibold text-yellow-800">ارسال پیامک</p>
                                <p class="text-sm text-yellow-600 mt-1">سریع و آسان</p>
                            </div>
                            <div class="bg-green-50 rounded-xl p-4 text-center">
                                <p class="font-semibold text-green-800">سفارش آنلاین</p>
                                <p class="text-sm text-green-600 mt-1">در هر زمان</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 2: Fast Processing -->
            <div class="step-card bg-white rounded-3xl p-8 md:p-12 shadow-lg border border-gray-100 fade-in" style="animation-delay: 0.2s;">
                <div class="flex flex-col md:flex-row items-start md:items-center">
                    <!-- Step Number -->
                    <div class="flex-shrink-0 mb-6 md:mb-0 md:ml-8">
                        <div class="w-20 h-20 md:w-24 md:h-24 rounded-full bg-gradient-to-br from-yellow-100 to-green-100 flex items-center justify-center">
                            <span class="text-4xl md:text-5xl font-bold step-number">۲</span>
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="flex-1">
                        <h3 class="text-3xl md:text-4xl font-bold text-yellow-700 mb-4">
                            پردازش سریع
                        </h3>
                        <div class="highlight-text mb-6">
                            <p class="text-lg md:text-xl text-gray-700 font-medium">
                                آماده‌سازی فوری با کیفیت تضمینی
                            </p>
                        </div>
                        <p class="text-lg md:text-xl text-gray-700 leading-relaxed mb-6">
                            تیم مجرب امجد بلافاصله پس از دریافت سفارش، 
                            <span class="font-semibold text-yellow-700">کنترل کیفیت دقیق</span> انجام داده و 
                            محصولات را با <span class="font-semibold text-green-700">بسته‌بندی استاندارد</span> 
                            و حفظ تازگی آماده ارسال می‌کند.
                        </p>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="flex items-start">
                                <div class="w-3 h-3 bg-yellow-500 rounded-full mt-2 ml-3 flex-shrink-0"></div>
                                <div>
                                    <p class="font-semibold text-gray-800">کنترل کیفیت دقیق</p>
                                    <p class="text-gray-600 text-sm mt-1">بررسی تک به تک محصولات</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-3 h-3 bg-green-500 rounded-full mt-2 ml-3 flex-shrink-0"></div>
                                <div>
                                    <p class="font-semibold text-gray-800">بسته‌بندی حرفه‌ای</p>
                                    <p class="text-gray-600 text-sm mt-1">حفظ تازگی و کیفیت</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 3: Reliable Delivery -->
            <div class="step-card bg-white rounded-3xl p-8 md:p-12 shadow-lg border border-gray-100 fade-in" style="animation-delay: 0.4s;">
                <div class="flex flex-col md:flex-row items-start md:items-center">
                    <!-- Step Number -->
                    <div class="flex-shrink-0 mb-6 md:mb-0 md:ml-8">
                        <div class="w-20 h-20 md:w-24 md:h-24 rounded-full bg-gradient-to-br from-green-100 to-yellow-100 flex items-center justify-center">
                            <span class="text-4xl md:text-5xl font-bold step-number">۳</span>
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="flex-1">
                        <h3 class="text-3xl md:text-4xl font-bold text-green-800 mb-4">
                            تحویل مطمئن
                        </h3>
                        <div class="highlight-text mb-6">
                            <p class="text-lg md:text-xl text-gray-700 font-medium">
                                ارسال سراسری با ضمانت کیفیت
                            </p>
                        </div>
                        <p class="text-lg md:text-xl text-gray-700 leading-relaxed mb-6">
                            محصولات امجد با <span class="font-semibold text-green-700">ارسال سریع و ایمن</span> 
                            به تمام نقاط ایران تحویل داده می‌شود. 
                            <span class="font-semibold text-yellow-600">تضمین کیفیت و تازگی</span> 
                            محصولات تا لحظه تحویل به دست شما.
                        </p>
                        <div class="bg-gradient-to-r from-green-50 to-yellow-50 rounded-2xl p-6">
                            <div class="grid md:grid-cols-3 gap-4 text-center">
                                <div>
                                    <p class="text-2xl font-bold text-green-700 mb-1">۲۴-۷۲</p>
                                    <p class="text-sm text-gray-600">ساعت تحویل</p>
                                </div>
                                <div>
                                    <p class="text-2xl font-bold text-yellow-600 mb-1">۱۰۰٪</p>
                                    <p class="text-sm text-gray-600">تضمین کیفیت</p>
                                </div>
                                <div>
                                    <p class="text-2xl font-bold text-green-700 mb-1">سراسری</p>
                                    <p class="text-sm text-gray-600">پوشش ارسال</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Trust Section -->
        <div class="mt-16 bg-gradient-to-r from-green-50 via-yellow-50 to-green-50 rounded-3xl p-8 md:p-12 text-center">
            <h3 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">
                چرا خشکبار امجد؟
            </h3>
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <h4 class="text-xl font-bold text-green-800 mb-3">بیش از 10 سال تجربه</h4>
                    <p class="text-gray-700">سه دهه خدمت صادقانه به خانواده‌های ایرانی</p>
                </div>
                <div>
                    <h4 class="text-xl font-bold text-yellow-700 mb-3">کیفیت تضمینی</h4>
                    <p class="text-gray-700">انتخاب بهترین محصولات از مرغوب‌ترین مناطق</p>
                </div>
                <div>
                    <h4 class="text-xl font-bold text-green-800 mb-3">خدمات پس از فروش</h4>
                    <p class="text-gray-700">پشتیبانی کامل و رضایت ۱۰۰٪ مشتریان</p>
                </div>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="mt-12 text-center">
            <h4 class="text-2xl font-bold text-gray-800 mb-6">
                برای سفارش همین الان تماس بگیرید
            </h4>
            <div class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-8 sm:space-x-reverse">
                <div class="bg-white rounded-full px-8 py-4 shadow-lg border border-green-100">
                    <span class="text-2xl font-bold text-green-700">09145015158</span>
                </div>
            </div>
        </div>
    </div>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'98323902227a9f32',t:'MTc1ODU0ODUxNi4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>

   @endsection
