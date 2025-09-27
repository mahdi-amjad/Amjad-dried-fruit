@extends('khoshkbar.layout.master')

@section('content')
    
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      
        .faq-item {
            transition: all 0.3s ease;
        }
        .faq-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
        .faq-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }
        .faq-content.active {
            max-height: 200px;
        }
        .faq-icon {
            transition: transform 0.3s ease;
        }
        .faq-icon.rotate {
            transform: rotate(180deg);
        }
        .fade-in {
            animation: fadeIn 0.6s ease-in;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-white min-h-screen">
    <!-- Main Container -->
    <div class="max-w-4xl mx-auto px-4 py-16">
        <!-- Header Section -->
        <div class="text-center mb-16 fade-in">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-green-600 to-green-700 rounded-full mb-6">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="white">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H8c0-2.21 1.79-4 4-4s4 1.79 4 4c0 .88-.36 1.68-.93 2.25z"/>
                </svg>
            </div>
            <h1 class="text-5xl md:text-6xl font-bold text-green-800 mb-4">
                سوالات متداول
            </h1>
            <div class="w-32 h-1 bg-gradient-to-r from-yellow-400 to-green-600 mx-auto rounded-full mb-6"></div>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                پاسخ سوالات رایج شما درباره محصولات و خدمات خشکبار امجد
            </p>
        </div>

        <!-- FAQ Items -->
        <div class="space-y-6">
            <!-- FAQ Item 1 -->
            <div class="faq-item bg-white border border-gray-200 rounded-2xl shadow-lg overflow-hidden fade-in">
                <button class="w-full px-8 py-6 text-right focus:outline-none" onclick="toggleFAQ(1)">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-600 to-green-700 rounded-full flex items-center justify-center ml-4">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
                                    <path d="M12 2l3.09 6.26L22 9l-5.91 5.74L17.18 21 12 18.27 6.82 21l1.09-6.26L2 9l6.91-1.74L12 2z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800">
                                کیفیت محصولات شما چگونه تضمین می‌شود؟
                            </h3>
                        </div>
                        <svg id="icon-1" class="faq-icon w-6 h-6 text-yellow-500" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/>
                        </svg>
                    </div>
                </button>
                <div id="content-1" class="faq-content px-8 pb-6">
                    <div class="pr-16">
                        <p class="text-gray-700 leading-relaxed text-lg">
                            ما تمام محصولات را مستقیماً از بهترین تولیدکنندگان محلی تهیه می‌کنیم و 
                            هر محموله قبل از بسته‌بندی توسط کارشناسان مجرب کنترل کیفیت می‌شود. 
                            همچنین از روش‌های نگهداری استاندارد و بسته‌بندی مناسب استفاده می‌کنیم.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="faq-item bg-white border border-gray-200 rounded-2xl shadow-lg overflow-hidden fade-in">
                <button class="w-full px-8 py-6 text-right focus:outline-none" onclick="toggleFAQ(2)">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-full flex items-center justify-center ml-4">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
                                    <path d="M19 7h-3V6a4 4 0 0 0-8 0v1H5a1 1 0 0 0-1 1v11a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V8a1 1 0 0 0-1-1zM10 6a2 2 0 0 1 4 0v1h-4V6zm8 13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V9h2v1a1 1 0 0 0 2 0V9h4v1a1 1 0 0 0 2 0V9h2v10z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800">
                                چگونه سفارش دهم و زمان تحویل چقدر است؟
                            </h3>
                        </div>
                        <svg id="icon-2" class="faq-icon w-6 h-6 text-yellow-500" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/>
                        </svg>
                    </div>
                </button>
                <div id="content-2" class="faq-content px-8 pb-6">
                    <div class="pr-16">
                        <p class="text-gray-700 leading-relaxed text-lg">
                            می‌توانید از طریق تماس تلفنی، پیامک یا مراجعه حضوری سفارش دهید. 
                            زمان تحویل ۲ تا ۳ روز کاری است. 
                            برای سفارشات بالای 2 ملیون تومان، ارسال رایگان می‌باشد.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="faq-item bg-white border border-gray-200 rounded-2xl shadow-lg overflow-hidden fade-in">
                <button class="w-full px-8 py-6 text-right focus:outline-none" onclick="toggleFAQ(3)">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-700 to-green-800 rounded-full flex items-center justify-center ml-4">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800">
                                آیا امکان مرجوعی کالا وجود دارد؟
                            </h3>
                        </div>
                        <svg id="icon-3" class="faq-icon w-6 h-6 text-yellow-500" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/>
                        </svg>
                    </div>
                </button>
                <div id="content-3" class="faq-content px-8 pb-6">
                    <div class="pr-16">
                        <p class="text-gray-700 leading-relaxed text-lg">
                            بله، در صورت وجود مشکل در کیفیت محصول یا عدم رضایت، 
                            تا ۷۲ ساعت پس از تحویل امکان مرجوعی و تعویض کالا وجود دارد. 
                            کافی است با ما تماس بگیرید تا فرآیند مرجوعی را آغاز کنیم.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div class="faq-item bg-white border border-gray-200 rounded-2xl shadow-lg overflow-hidden fade-in">
                <button class="w-full px-8 py-6 text-right focus:outline-none" onclick="toggleFAQ(4)">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-yellow-600 to-green-600 rounded-full flex items-center justify-center ml-4">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800">
                                محصولات شما از کجا تهیه می‌شود؟
                            </h3>
                        </div>
                        <svg id="icon-4" class="faq-icon w-6 h-6 text-yellow-500" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/>
                        </svg>
                    </div>
                </button>
                <div id="content-4" class="faq-content px-8 pb-6">
                    <div class="pr-16">
                        <p class="text-gray-700 leading-relaxed text-lg">
                             همه محصولات ما از بهترین مناطق تولیدی ایران انتخاب می‌شوند و کیفیت آن‌ها تضمین شده است.
             </p>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 5 -->
            <div class="faq-item bg-white border border-gray-200 rounded-2xl shadow-lg overflow-hidden fade-in">
                <button class="w-full px-8 py-6 text-right focus:outline-none" onclick="toggleFAQ(5)">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-600 to-yellow-500 rounded-full flex items-center justify-center ml-4">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
                                    <path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800">
                                روش‌های پرداخت چه مواردی را شامل می‌شود؟
                            </h3>
                        </div>
                        <svg id="icon-5" class="faq-icon w-6 h-6 text-yellow-500" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/>
                        </svg>
                    </div>
                </button>
                <div id="content-5" class="faq-content px-8 pb-6">
                    <div class="pr-16">
                        <p class="text-gray-700 leading-relaxed text-lg">
                            پرداخت نقدی هنگام تحویل، کارت به کارت، پرداخت اینترنتی و 
                            چک برای خریدهای عمده امکان‌پذیر است. همچنین برای مشتریان ثابت، 
                            امکان خرید اعتباری نیز فراهم شده است.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 6 -->
            <div class="faq-item bg-white border border-gray-200 rounded-2xl shadow-lg overflow-hidden fade-in">
                <button class="w-full px-8 py-6 text-right focus:outline-none" onclick="toggleFAQ(6)">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-green-700 rounded-full flex items-center justify-center ml-4">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
                                    <path d="M12 2l3.09 6.26L22 9l-5.91 5.74L17.18 21 12 18.27 6.82 21l1.09-6.26L2 9l6.91-1.74L12 2z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800">
                                آیا تخفیف ویژه برای خریدهای عمده دارید؟
                            </h3>
                        </div>
                        <svg id="icon-6" class="faq-icon w-6 h-6 text-yellow-500" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/>
                        </svg>
                    </div>
                </button>
                <div id="content-6" class="faq-content px-8 pb-6">
                    <div class="pr-16">
                        <p class="text-gray-700 leading-relaxed text-lg">
                             بله، تخفیف‌های ویژه برای خریدهای عمده در نظر گرفته شده است. 
                برای مقادیر بالا، تخفیف تا ۱۵٪ و قیمت‌های ویژه مشاغل اعمال می‌شود.
            </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="mt-16 text-center bg-gradient-to-r from-green-50 to-yellow-50 rounded-3xl p-8">
            <h3 class="text-2xl font-bold text-green-800 mb-4">
                سوال دیگری دارید؟
            </h3>
            <p class="text-gray-700 mb-6">
                تیم پشتیبانی ما آماده پاسخگویی به سوالات شماست
            </p>
            <div class="flex justify-center items-center space-x-4 space-x-reverse">
                <div class="flex items-center bg-white rounded-full px-6 py-3 shadow-md">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="#22C55E" class="ml-2">
                        <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                    </svg>
                    <span class="text-green-700 font-medium">09145015158</span>
                </div>
                <div class="flex items-center bg-white rounded-full px-6 py-3 shadow-md">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="#EAB308" class="ml-2">
                        <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.89 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                    </svg>
                    <span class="text-yellow-700 font-medium">info@amjad.com</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleFAQ(id) {
            const content = document.getElementById(`content-${id}`);
            const icon = document.getElementById(`icon-${id}`);
            
            // Close all other FAQs
            for (let i = 1; i <= 6; i++) {
                if (i !== id) {
                    const otherContent = document.getElementById(`content-${i}`);
                    const otherIcon = document.getElementById(`icon-${i}`);
                    otherContent.classList.remove('active');
                    otherIcon.classList.remove('rotate');
                }
            }
            
            // Toggle current FAQ
            content.classList.toggle('active');
            icon.classList.toggle('rotate');
        }
    </script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9832118aa3093835',t:'MTc1ODU0Njg5OS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script>
@endsection
