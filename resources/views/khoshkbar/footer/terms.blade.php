@extends('khoshkbar.layout.master')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .section-card {
            transition: all 0.3s ease;
        }
        .section-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }
        .leaf-decoration {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='%2322C55E' opacity='0.1'%3E%3Cpath d='M17,8C8,10 5.9,16.17 3.82,21.34L5.71,22L6.66,19.7C7.14,19.87 7.64,20 8,20C19,20 22,3 22,3C21,5 14,5.25 9,6.25C4,7.25 2,11.5 2,15.5C2,15.5 2,16.75 2,16.75C2,16.75 2,18 2,18C4,16 8,16 8,16C8,16 8,16 8,16C10,16 12,16 13,16C14,16 17,8 17,8Z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: top right;
            background-size: 40px 40px;
        }
        .fade-in {
            animation: fadeIn 0.8s ease-in;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .gradient-text {
            background: linear-gradient(135deg, #22C55E, #EAB308);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .decorative-border {
            border-right: 4px solid transparent;
            border-image: linear-gradient(135deg, #22C55E, #EAB308) 1;
        }
    </style>
<body class="bg-white min-h-screen">
    <!-- Main Container -->
    <div class="max-w-4xl mx-auto px-4 py-16">
        <!-- Header Section -->
        <div class="text-center mb-16 fade-in">
            <!-- Decorative Elements -->
            <div class="flex justify-center items-center mb-8">
                <div class="w-16 h-16 bg-gradient-to-br from-green-100 to-yellow-100 rounded-full flex items-center justify-center">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="#22C55E">
                        <path d="M9,2V8H7V10H9C10.1,10 11,9.1 11,8V7H13V8C13,9.1 13.9,10 15,10H17V8H15V2H13V6H11V2H9M12,12A3,3 0 0,0 9,15A3,3 0 0,0 12,18A3,3 0 0,0 15,15A3,3 0 0,0 12,12M12,16A1,1 0 0,1 11,15A1,1 0 0,1 12,14A1,1 0 0,1 13,15A1,1 0 0,1 12,16M7,18A2,2 0 0,0 5,20A2,2 0 0,0 7,22H17A2,2 0 0,0 19,20A2,2 0 0,0 17,18H7Z"/>
                    </svg>
                </div>
            </div>
            
            <h1 class="text-5xl md:text-6xl font-bold gradient-text mb-6">
                قوانین و مقررات
            </h1>
            <div class="w-32 h-1 bg-gradient-to-r from-green-500 to-yellow-500 mx-auto rounded-full mb-6"></div>
            <h2 class="text-3xl md:text-4xl font-semibold text-gray-800 mb-4">
                خشکبار امجد
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                لطفاً قبل از خرید، قوانین و شرایط فروشگاه را با دقت مطالعه فرمایید
            </p>
        </div>

        <!-- Terms Sections -->
        <div class="space-y-8">
            <!-- Section 1: General Terms -->
            <div class="section-card bg-white rounded-2xl p-8 shadow-lg border border-gray-100 leaf-decoration fade-in">
                <div class="decorative-border pr-6">
                    <h3 class="text-2xl md:text-3xl font-bold text-green-800 mb-6 flex items-center">
                        <span class="w-8 h-8 bg-gradient-to-r from-green-500 to-yellow-500 rounded-full flex items-center justify-center text-white font-bold text-sm ml-3">۱</span>
                        شرایط کلی
                    </h3>
                    <div class="space-y-4 text-gray-700 leading-relaxed">
                        <p class="text-lg">
                            با استفاده از خدمات خشکبار امجد، شما موافقت خود را با تمامی قوانین و مقررات ذکر شده در این صفحه اعلام می‌کنید.
                        </p>
                        <p>
                            تمامی محصولات ارائه شده در فروشگاه امجد دارای مجوزهای لازم بوده و از بالاترین کیفیت برخوردارند. ما متعهد به ارائه محصولات تازه و سالم هستیم.
                        </p>
                        <p>
                            فروشگاه حق تغییر قیمت‌ها و شرایط فروش را بدون اطلاع قبلی محفوظ می‌دارد. قیمت‌های نهایی در زمان تأیید سفارش اعمال خواهد شد.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Section 2: Order & Payment -->
            <div class="section-card bg-white rounded-2xl p-8 shadow-lg border border-gray-100 leaf-decoration fade-in" style="animation-delay: 0.1s;">
                <div class="decorative-border pr-6">
                    <h3 class="text-2xl md:text-3xl font-bold text-yellow-700 mb-6 flex items-center">
                        <span class="w-8 h-8 bg-gradient-to-r from-yellow-500 to-green-500 rounded-full flex items-center justify-center text-white font-bold text-sm ml-3">۲</span>
                        سفارش و پرداخت
                    </h3>
                    <div class="space-y-4 text-gray-700 leading-relaxed">
                        <p class="text-lg font-medium text-yellow-800">
                            روش‌های سفارش‌گیری:
                        </p>
                        <ul class="space-y-2 pr-6">
                            <li class="flex items-start">
                                <span class="w-2 h-2 bg-yellow-500 rounded-full mt-2 ml-3 flex-shrink-0"></span>
                                تماس تلفنی در ساعات کاری (۸ صبح تا ۸ شب)
                            </li>
                            <li class="flex items-start">
                                <span class="w-2 h-2 bg-green-500 rounded-full mt-2 ml-3 flex-shrink-0"></span>
                                ارسال پیامک به شماره اعلام شده
                            </li>
                            <li class="flex items-start">
                                <span class="w-2 h-2 bg-yellow-500 rounded-full mt-2 ml-3 flex-shrink-0"></span>
                                مراجعه حضوری به فروشگاه
                            </li>
                        </ul>
                        <p class="bg-yellow-50 p-4 rounded-lg border-r-4 border-yellow-400">
                            <strong>توجه:</strong> حداقل مبلغ سفارش ۱۰۰ هزار تومان می‌باشد. برای سفارشات زیر این مبلغ، هزینه ارسال به عهده مشتری خواهد بود.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Section 3: Quality & Return -->
            <div class="section-card bg-white rounded-2xl p-8 shadow-lg border border-gray-100 leaf-decoration fade-in" style="animation-delay: 0.2s;">
                <div class="decorative-border pr-6">
                    <h3 class="text-2xl md:text-3xl font-bold text-green-800 mb-6 flex items-center">
                        <span class="w-8 h-8 bg-gradient-to-r from-green-500 to-yellow-500 rounded-full flex items-center justify-center text-white font-bold text-sm ml-3">۳</span>
                        کیفیت و مرجوعی
                    </h3>
                    <div class="space-y-4 text-gray-700 leading-relaxed">
                        <p class="text-lg font-medium text-green-800">
                            تضمین کیفیت:
                        </p>
                        <p>
                            تمامی محصولات قبل از ارسال توسط کارشناسان مجرب کنترل کیفیت می‌شوند. در صورت وجود هرگونه مشکل در کیفیت محصول، مشتری می‌تواند تا ۷۲ ساعت پس از تحویل، درخواست تعویض یا مرجوعی نماید.
                        </p>
                        <div class="bg-green-50 p-6 rounded-xl">
                            <h4 class="font-semibold text-green-800 mb-3">شرایط مرجوعی کالا:</h4>
                            <ul class="space-y-2">
                                <li class="flex items-start">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="#22C55E" class="mt-1 ml-2 flex-shrink-0">
                                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                                    </svg>
                                    محصول در بسته‌بندی اصلی باشد
                                </li>
                                <li class="flex items-start">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="#22C55E" class="mt-1 ml-2 flex-shrink-0">
                                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                                    </svg>
                                    حداکثر ۷۲ ساعت پس از تحویل
                                </li>
                                <li class="flex items-start">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="#22C55E" class="mt-1 ml-2 flex-shrink-0">
                                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                                    </svg>
                                    ارائه فیش خرید یا کد سفارش
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 4: Delivery -->
            <div class="section-card bg-white rounded-2xl p-8 shadow-lg border border-gray-100 leaf-decoration fade-in" style="animation-delay: 0.3s;">
                <div class="decorative-border pr-6">
                    <h3 class="text-2xl md:text-3xl font-bold text-yellow-700 mb-6 flex items-center">
                        <span class="w-8 h-8 bg-gradient-to-r from-yellow-500 to-green-500 rounded-full flex items-center justify-center text-white font-bold text-sm ml-3">۴</span>
                        ارسال و تحویل
                    </h3>
                    <div class="space-y-4 text-gray-700 leading-relaxed">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="bg-yellow-50 p-4 rounded-lg">
                                <h4 class="font-semibold text-yellow-800 mb-2">تهران و حومه:</h4>
                                <p>ارسال در کمتر از ۲۴ ساعت</p>
                                <p class="text-sm text-yellow-600">رایگان برای خرید بالای ۵۰۰ هزار تومان</p>
                            </div>
                            <div class="bg-green-50 p-4 rounded-lg">
                                <h4 class="font-semibold text-green-800 mb-2">سایر شهرها:</h4>
                                <p>ارسال ۲ تا ۳ روز کاری</p>
                                <p class="text-sm text-green-600">رایگان برای خرید بالای ۱ میلیون تومان</p>
                            </div>
                        </div>
                        <p class="bg-gray-50 p-4 rounded-lg">
                            <strong>نکته مهم:</strong> زمان تحویل ممکن است در ایام پیک و تعطیلات رسمی با تأخیر همراه باشد. مشتریان محترم قبل از ارسال از طریق پیامک مطلع خواهند شد.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Section 5: Privacy & Support -->
            <div class="section-card bg-white rounded-2xl p-8 shadow-lg border border-gray-100 leaf-decoration fade-in" style="animation-delay: 0.4s;">
                <div class="decorative-border pr-6">
                    <h3 class="text-2xl md:text-3xl font-bold text-green-800 mb-6 flex items-center">
                        <span class="w-8 h-8 bg-gradient-to-r from-green-500 to-yellow-500 rounded-full flex items-center justify-center text-white font-bold text-sm ml-3">۵</span>
                        حریم خصوصی و پشتیبانی
                    </h3>
                    <div class="space-y-4 text-gray-700 leading-relaxed">
                        <p class="text-lg">
                            اطلاعات شخصی مشتریان کاملاً محرمانه بوده و تنها برای پردازش سفارشات استفاده می‌شود. هیچ‌گونه اطلاعاتی با اشخاص ثالث به اشتراک گذاشته نخواهد شد.
                        </p>
                        <div class="bg-gradient-to-r from-green-50 to-yellow-50 p-6 rounded-xl">
                            <h4 class="font-semibold text-gray-800 mb-4">راه‌های ارتباط با پشتیبانی:</h4>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div class="flex items-center">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="#22C55E" class="ml-3">
                                        <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                                    </svg>
                                    <span>09145015158</span>
                                </div>
                                <div class="flex items-center">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="#EAB308" class="ml-3">
                                        <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.89 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                    </svg>
                                    <span>info@amjad-nuts.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Note -->
        <div class="mt-16 text-center bg-gradient-to-r from-green-50 via-yellow-50 to-green-50 rounded-2xl p-8">
            <div class="flex justify-center mb-4">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="#22C55E">
                    <path d="M12,2A3,3 0 0,1 15,5V11A3,3 0 0,1 12,14A3,3 0 0,1 9,11V5A3,3 0 0,1 12,2M19,11C19,14.53 16.39,17.44 13,17.93V21H11V17.93C7.61,17.44 5,14.53 5,11H7A5,5 0 0,0 12,16A5,5 0 0,0 17,11H19Z"/>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-4">
                خشکبار امجد - بیش از ۳۰ سال تجربه
            </h3>
            <p class="text-gray-600 max-w-2xl mx-auto leading-relaxed">
                این قوانین و مقررات در تاریخ ۱۴۰۳/۰۱/۰۱ به‌روزرسانی شده و برای تمامی مشتریان قابل اجرا می‌باشد. 
                فروشگاه حق تغییر و اصلاح این قوانین را محفوظ می‌دارد.
            </p>
            <div class="mt-6">
                <span class="inline-block bg-white px-6 py-2 rounded-full shadow-md text-sm text-gray-600">
                    آخرین به‌روزرسانی: ۱۴۰۳/۰۱/۰۱
                </span>
            </div>
        </div>
    </div>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'98324c2fc0053a97',t:'MTc1ODU0OTMwMS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>

@endsection
