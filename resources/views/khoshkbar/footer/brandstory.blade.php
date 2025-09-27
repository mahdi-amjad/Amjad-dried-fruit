@extends('khoshkbar.layout.master')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-pattern {
            background-image:
                radial-gradient(circle at 25% 25%, rgba(34, 197, 94, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(251, 191, 36, 0.08) 0%, transparent 50%),
                linear-gradient(45deg, rgba(34, 197, 94, 0.03) 25%, transparent 25%),
                linear-gradient(-45deg, rgba(251, 191, 36, 0.03) 25%, transparent 25%);
            background-size: 60px 60px, 80px 80px, 20px 20px, 20px 20px;
        }

        .text-shadow {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .timeline-line {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            background: linear-gradient(to bottom, #22C55E, #EAB308, #22C55E);
            border-radius: 2px;
            box-shadow: 0 0 10px rgba(34, 197, 94, 0.3);
        }

        .timeline-dot {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: linear-gradient(45deg, #22C55E, #EAB308);
            border: 4px solid white;
            box-shadow: 0 0 15px rgba(34, 197, 94, 0.4);
            z-index: 10;
        }

        .timeline-section {
            position: relative;
            margin-bottom: 80px;
        }

        .timeline-content {
            width: 45%;
            padding: 30px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .timeline-content:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .timeline-left .timeline-content {
            margin-right: 55%;
        }

        .timeline-right .timeline-content {
            margin-left: 55%;
        }

        .floating {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-15px) rotate(5deg);
            }
        }

        .fade-in {
            animation: fadeIn 1s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .pulse-glow {
            animation: pulseGlow 3s ease-in-out infinite;
        }

        @keyframes pulseGlow {

            0%,
            100% {
                box-shadow: 0 0 15px rgba(34, 197, 94, 0.4);
            }

            50% {
                box-shadow: 0 0 25px rgba(251, 191, 36, 0.6);
            }
        }

        @media (max-width: 768px) {
            .timeline-line {
                left: 30px;
                transform: none;
            }

            .timeline-dot {
                left: 30px;
                transform: translateX(-50%);
            }

            .timeline-content {
                width: calc(100% - 80px);
                margin-left: 80px !important;
                margin-right: 0 !important;
            }
        }
    </style>

    <body class="bg-gradient-to-br from-amber-50 via-green-50 to-yellow-50 bg-pattern min-h-screen">
        <!-- Floating Decorative Elements -->
        <div class="fixed top-20 left-10 floating opacity-20 pointer-events-none">
            <svg width="80" height="80" viewBox="0 0 100 100" class="text-green-600">
                <path d="M50 10 C30 20, 20 40, 30 60 C40 80, 60 80, 70 60 C80 40, 70 20, 50 10 Z" fill="currentColor" />
                <path d="M45 25 Q50 35 55 25" stroke="#22C55E" stroke-width="2" fill="none" />
            </svg>
        </div>

        <div class="fixed top-40 right-16 floating opacity-15 pointer-events-none" style="animation-delay: -2s;">
            <svg width="60" height="60" viewBox="0 0 100 100" class="text-yellow-500">
                <ellipse cx="50" cy="50" rx="25" ry="35" fill="currentColor"
                    transform="rotate(15 50 50)" />
                <ellipse cx="50" cy="50" rx="20" ry="30" fill="#EAB308"
                    transform="rotate(15 50 50)" />
            </svg>
        </div>

        <div class="fixed bottom-32 left-20 floating opacity-20 pointer-events-none" style="animation-delay: -4s;">
            <svg width="70" height="70" viewBox="0 0 100 100" class="text-green-700">
                <circle cx="50" cy="50" r="25" fill="currentColor" />
                <circle cx="50" cy="50" r="20" fill="#15803D" />
                <path d="M30 50 Q50 30 70 50 Q50 70 30 50" fill="#166534" />
            </svg>
        </div>

        <!-- Header Section -->
        <header class="relative py-20 px-4 text-center overflow-hidden">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-6xl md:text-8xl font-bold text-green-800 mb-6 text-shadow fade-in">
                    داستان برند ما
                </h1>
                <div
                    class="w-40 h-2 bg-gradient-to-r from-yellow-400 via-green-600 to-yellow-400 mx-auto rounded-full mb-8">
                </div>
                <p class="text-xl md:text-2xl text-green-700 font-medium">
                    از دل طبیعت تا سفره شما
                </p>
            </div>
        </header>

        <!-- Timeline Section -->
        <main class="relative max-w-6xl mx-auto px-4 pb-20">
            <!-- Timeline Line -->
            <div class="timeline-line" style="top: 0; height: 100%;"></div>

            <!-- Timeline Section 1: Origins -->
            <div class="timeline-section timeline-right fade-in">
                <div class="timeline-dot pulse-glow" style="top: 50px;"></div>
                <div class="timeline-content">
                    <div class="flex items-center mb-4">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-green-600 to-green-700 rounded-full flex items-center justify-center ml-4">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="white">
                                <path d="M12 2L13.09 8.26L20 9L13.09 9.74L12 16L10.91 9.74L4 9L10.91 8.26L12 2Z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-green-800">آغاز راه</h3>
                            <p class="text-green-600 font-medium">دهه 1390</p>
                        </div>
                    </div>
                    <p class="text-gray-700 leading-relaxed text-lg">
                        خشکبار امجد فعالیت خود را با عشقی عمیق به طبیعت و علاقه به طعم‌های اصیل ایرانی آغاز کرد.
                        هدف خانواده امجد از ابتدا روشن بود: رساندن بهترین و طبیعی‌ترین مغزها و میوه‌های خشک،
                        مستقیم از دل باغات و زمین‌های کشاورزان مورد اعتماد، به سفره خانواده‌های ایرانی.
                    </p>
                    <!-- Decorative nuts -->
                    <div class="flex justify-end mt-4 space-x-2 space-x-reverse">
                        <div class="w-8 h-8 bg-yellow-200 rounded-full flex items-center justify-center">🌰</div>
                        <div class="w-8 h-8 bg-green-200 rounded-full flex items-center justify-center">🥜</div>
                    </div>
                </div>
            </div>

            <!-- Timeline Section 2: Growth -->
            <div class="timeline-section timeline-left fade-in">
                <div class="timeline-dot pulse-glow" style="top: 50px;"></div>
                <div class="timeline-content">
                    <div class="flex items-center mb-4">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-full flex items-center justify-center ml-4">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="white">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12S6.48 22 12 22 22 17.52 22 12 17.52 2 12 2ZM13 17H11V15H13V17ZM13 13H11V7H13V13Z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-yellow-700">رشد و توسعه</h3>
                            <p class="text-yellow-600 font-medium">دهه 1395</p>
                        </div>
                    </div>
                    <p class="text-gray-700 leading-relaxed text-lg">
                        با گسترش همکاری مستقیم با کشاورزان و ایجاد شبکه‌ای گسترده از تولیدکنندگان،
                        توانستیم کیفیت محصولات را تضمین کرده و در عین حال به کشاورزان بومی قدرت بیشتری ببخشیم.
                        در این دوره، اعتماد مشتریان بزرگ‌ترین سرمایه ما شد و نام «امجد» جایگاه خود را در بازار خشکبار ایران
                        پیدا کرد.
                    </p>
                    <div class="flex justify-start mt-4 space-x-2 space-x-reverse">
                        <div class="w-8 h-8 bg-green-200 rounded-full flex items-center justify-center">🌿</div>
                        <div class="w-8 h-8 bg-yellow-200 rounded-full flex items-center justify-center">⭐</div>
                    </div>
                </div>
            </div>

            <!-- Timeline Section 3: Innovation -->
            <div class="timeline-section timeline-right fade-in">
                <div class="timeline-dot pulse-glow" style="top: 50px;"></div>
                <div class="timeline-content">
                    <div class="flex items-center mb-4">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-green-700 to-green-800 rounded-full flex items-center justify-center ml-4">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="white">
                                <path
                                    d="M9 11H7V9H9V11ZM13 11H11V9H13V11ZM17 11H15V9H17V11ZM19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V8H19V19Z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-green-800">نوآوری و کیفیت</h3>
                            <p class="text-green-600 font-medium">دهه 1400</p>
                        </div>
                    </div>
                    <p class="text-gray-700 leading-relaxed text-lg">
                        با بهره‌گیری از تکنولوژی‌های نوین بسته‌بندی و رعایت استانداردهای بین‌المللی،
                        توانستیم تازگی و طعم اصیل محصولات را حفظ کنیم. در این سال‌ها تنوع محصولات امجد
                        بیشتر شد و میوه‌های خشک و آجیل‌های ترکیبی به سبد کالاهای ما اضافه گردید.
                    </p>
                    <div class="flex justify-end mt-4 space-x-2 space-x-reverse">
                        <div class="w-8 h-8 bg-yellow-200 rounded-full flex items-center justify-center">📦</div>
                        <div class="w-8 h-8 bg-green-200 rounded-full flex items-center justify-center">✨</div>
                    </div>
                </div>
            </div>

            <!-- Timeline Section 4: Present -->
            <div class="timeline-section timeline-left fade-in">
                <div class="timeline-dot pulse-glow" style="top: 50px;"></div>
                <div class="timeline-content">
                    <div class="flex items-center mb-4">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-yellow-600 to-green-600 rounded-full flex items-center justify-center ml-4">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="white">
                                <path d="M12 2L15.09 8.26L23 9L15.09 9.74L12 17L8.91 9.74L1 9L8.91 8.26L12 2Z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-green-800">امروز و آینده</h3>
                            <p class="text-green-600 font-medium">امروز</p>
                        </div>
                    </div>
                    <p class="text-gray-700 leading-relaxed text-lg">
                        امروز، پس از بیش از یک دهه تجربه، خشکبار امجد نماد کیفیت و اصالت در صنعت خشکبار ایران است.
                        ما همچنان با همان عشق و انگیزه روزهای نخست، بهترین محصولات طبیعی را به خانواده‌های ایرانی عرضه
                        می‌کنیم
                        و چشم‌اندازمان رساندن این اصالت به بازارهای جهانی است.
                    </p>
                    <div class="flex justify-start mt-4 space-x-2 space-x-reverse">
                        <div class="w-8 h-8 bg-green-200 rounded-full flex items-center justify-center">❤️</div>
                        <div class="w-8 h-8 bg-yellow-200 rounded-full flex items-center justify-center">🏆</div>
                    </div>
                </div>
            </div>

            <!-- Values Section -->
            <div class="relative mt-20 mb-16">
                <div class="timeline-dot pulse-glow" style="top: 50px;"></div>
                <div class="bg-white/90 backdrop-blur-sm rounded-3xl shadow-2xl p-8 md:p-12 mx-4">
                    <h2 class="text-4xl font-bold text-center text-green-800 mb-12">ارزش‌های ما</h2>
                    <div class="grid md:grid-cols-3 gap-8">
                        <!-- Quality -->
                        <div class="text-center group">
                            <div
                                class="w-20 h-20 bg-gradient-to-br from-green-600 to-green-700 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                                <svg width="40" height="40" viewBox="0 0 24 24" fill="white">
                                    <path d="M12 2L13.09 8.26L20 9L13.09 9.74L12 16L10.91 9.74L4 9L10.91 8.26L12 2Z" />
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-green-800 mb-4">کیفیت برتر</h3>
                            <p class="text-gray-700 leading-relaxed">
                                انتخاب دقیق بهترین محصولات طبیعی با استانداردهای بالای کیفی
                            </p>
                        </div>

                        <!-- Trust -->
                        <div class="text-center group">
                            <div
                                class="w-20 h-20 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                                <svg width="40" height="40" viewBox="0 0 24 24" fill="white">
                                    <path d="M12 1L15.09 8.26L23 9L15.09 9.74L12 17L8.91 9.74L1 9L8.91 8.26L12 1Z" />
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-yellow-700 mb-4">اعتماد و صداقت</h3>
                            <p class="text-gray-700 leading-relaxed">
                                بیش از سه دهه تجربه و رضایت هزاران خانواده ایرانی
                            </p>
                        </div>

                        <!-- Tradition -->
                        <div class="text-center group">
                            <div
                                class="w-20 h-20 bg-gradient-to-br from-green-700 to-green-800 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                                <svg width="40" height="40" viewBox="0 0 24 24" fill="white">
                                    <path
                                        d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 1L13.5 2.5L16.17 5.17L10.5 10.84L6.83 7.17L2 12L3.41 13.41L6.83 10L10.5 13.67L16.17 8L18.83 10.67L21 9Z" />
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-green-800 mb-4">سنت و اصالت</h3>
                            <p class="text-gray-700 leading-relaxed">
                                حفظ روش‌های سنتی و اصیل ایرانی در تولید و ارائه محصولات
                            </p>
                        </div>
                    </div>
                </div>
            </div>


        </main>


        <script>
            (function() {
                function c() {
                    var b = a.contentDocument || a.contentWindow.document;
                    if (b) {
                        var d = b.createElement('script');
                        d.innerHTML =
                            "window.__CF$cv$params={r:'9831d6ccd6d4362f',t:'MTc1ODU0NDQ5My4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
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
@endsection
