@extends('khoshkbar.layout.master')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .btn {
            background: linear-gradient(135deg, #5e8e3e, #4a7332);
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        .btn:hover {
            background: linear-gradient(135deg, #4a7332, #3d5f29);
            transform: translateY(-1px);
        }

        .alert-success {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            padding: 16px;
            border-radius: 8px;
            margin-bottom: 24px;
            position: relative;
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: #f9fafb;
        }

        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
            background: white;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .phone-link {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-top: 8px;
        }

        .phone-link:hover {
            background: linear-gradient(135deg, #059669, #047857);
            transform: translateY(-1px);
        }

        .inquiry-form {
            background: #f8fafc;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 20px;
            margin-top: 16px;
            display: none;
        }

        .inquiry-form.active {
            display: block;
            animation: fadeIn 0.3s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .close-btn {
            position: absolute;
            top: 12px;
            left: 12px;
            background: rgba(0, 0, 0, 0.1);
            border: none;
            border-radius: 50%;
            width: 32px;
            height: 32px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .close-btn:hover {
            background: rgba(0, 0, 0, 0.2);
        }
    </style>
    </head>

    <body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
        <div class="container mx-auto px-4 py-8 max-w-6xl">

            <!-- عنوان صفحه -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-slate-800 mb-4">
                    🛒 خرید عمده
                </h1>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-indigo-600 mx-auto rounded-full"></div>
                <p class="text-slate-600 mt-4 text-lg">برای خرید عمده محصولات با ما تماس بگیرید</p>
            </div>

            <!-- پیام موفقیت -->
            <div id="success-alert" class="alert-success hidden">
                <button class="close-btn" onclick="closeAlert()">✕</button>
                <div class="flex items-center gap-3">
                    <span class="text-2xl">✅</span>
                    <span>درخواست شما با موفقیت ثبت شد! به زودی با شما تماس خواهیم گرفت.</span>
                </div>
            </div>

            <!-- گرید محصولات -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($products as $product)
                    <!-- محصول 1 -->
                    <div class="card p-6">
                        <div class="text-center mb-4">
                            <div class="w-24 h-24 mx-auto mb-3 rounded-lg overflow-hidden shadow-md">
                                <img src="{{ asset('AdminAssets.Product-image/' . $product->image) }}" alt="">
                            </div>
                            <h3 class="text-xl font-bold text-slate-800">{{ $product->name }} </h3>
                        </div>

                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            {!! substr($product->description, 0, 250) !!}
                        </p>

                        <div class="border-t pt-4">
                            <p class="text-sm text-slate-700 font-medium mb-2">برای خرید عمده تماس بگیرید:</p>
                            <a href="tel:09145015158" class="phone-link">
                                📞 09145015158
                            </a>
                        </div>

                        <button class="btn mt-4" onclick="toggleForm('form-{{ $loop->iteration }}')">
                            درخواست خرید عمده
                        </button>
                        <!-- فرم درخواست -->
                        <div id="form-{{ $loop->iteration }}" class="inquiry-form">
                            <h4 class="font-bold text-slate-800 mb-4">درخواست خرید عمده </h4>
                            <form action="{{ route('wholesale.inquiry.store') }}" id="wholesale" method="POST" class="space-y-4">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="text" name="name" placeholder="نام و نام خانوادگی" class="form-input"
                                    required>
                                <input type="tel" name="phone" placeholder="شماره تماس" class="form-input" required>
                                <input type="number" name="approx_quantity" placeholder="تعداد تقریبی مورد نیاز"
                                    class="form-input" min="1" required>
                                <textarea name="message" placeholder="توضیحات  " class="form-input" rows="3"></textarea>
                                <button type="submit" class="btn">ارسال درخواست</button>
                            </form>

                        </div>
                    </div>
                @endforeach


            </div>

            <!-- اطلاعات تماس -->
            <div class="mt-12 text-center">
                <div class="card p-8 max-w-2xl mx-auto">
                    <h2 class="text-2xl font-bold text-slate-800 mb-4">📞 اطلاعات تماس</h2>
                    <p class="text-slate-600 mb-6">برای کسب اطلاعات بیشتر و مشاوره خرید عمده با ما در تماس باشید</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <a href="tel:09145015158" class="phone-link">
                            📱 09145015158
                        </a>
                        <a href="tel:02112345678" class="phone-link">
                            ☎️ ۰۲۱-۱۲۳۴-۵۶۷۸
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
        <script>
            function toggleForm(formId) {
                // بستن همه فرم‌های باز
                const allForms = document.querySelectorAll('.inquiry-form');
                allForms.forEach(form => {
                    if (form.id !== formId) {
                        form.classList.remove('active');
                    }
                });

                // باز/بسته کردن فرم مورد نظر
                const form = document.getElementById(formId);
                form.classList.toggle('active');

                if (form.classList.contains('active')) {
                    setTimeout(() => {
                        form.scrollIntoView({
                            behavior: 'smooth',
                            block: 'nearest'
                        });
                    }, 100);
                }
            }

            function submitForm(event, productName) {
                event.preventDefault();

                // نمایش پیام موفقیت
                const alert = document.getElementById('success-alert');
                alert.classList.remove('hidden');

                // اسکرول به بالای صفحه
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });

                // بستن فرم
                const form = event.target.closest('.inquiry-form');
                form.classList.remove('active');

                // پاک کردن فرم
                event.target.reset();

                // مخفی کردن خودکار پیام بعد از 5 ثانیه
                setTimeout(() => {
                    alert.classList.add('hidden');
                }, 5000);
            }

            function closeAlert() {
                document.getElementById('success-alert').classList.add('hidden');
            }

            // بستن فرم‌ها با کلیک خارج از آن‌ها
            document.addEventListener('click', function(event) {
                if (!event.target.closest('.inquiry-form') && !event.target.closest('button')) {
                    const allForms = document.querySelectorAll('.inquiry-form');
                    allForms.forEach(form => {
                        form.classList.remove('active');
                    });
                }
            });
        </script>
        <script>
            (function() {
                function c() {
                    var b = a.contentDocument || a.contentWindow.document;
                    if (b) {
                        var d = b.createElement('script');
                        d.innerHTML =
                            "window.__CF$cv$params={r:'98223c9bb1d464e8',t:'MTc1ODM4MDg5MS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Khoshkbar\wholesale', '#wholesale') !!}
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
 <script>
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif
    </script>
@endsection
