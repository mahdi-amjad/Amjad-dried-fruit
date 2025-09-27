@extends('khoshkbar.layout.master')

@section('content')

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            'main-bg': '#FFFFFF',
                            'main-text': '#000000',
                            'button-blue': '#5e8e3e',
                            'link-blue': '#16a34a',
                            'header-bg': '#F8F9FA',
                            'footer-bg': '#343A40'
                        }
                    }
                }
            }
        </script>
        <style>
            @import url('https://cdn.jsdelivr.net/gh/rastikerdar/iran-sans/dist/font-face.css');

            body {
                font-family: 'Iran Sans', sans-serif;
            }

            .ltr {
                direction: ltr;
            }
        </style>
    </head>

    <body class="bg-main-bg text-main-text min-h-screen">


        <div class="max-w-7xl mx-auto px-4 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Sidebar Navigation -->
                <div class="lg:col-span-1">
                    <div class="bg-main-bg rounded-lg shadow-sm border p-6">
                        <div class="text-center mb-6">
                            <div
                                class="w-20 h-20 bg-button-blue rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-3">
                                ع.ا
                            </div>
                            <h3 class="font-semibold text-main-text"> {{ $user->name }}</h3>
                            <p class="text-sm text-gray-600">عضو ویژه</p>
                        </div>

                        <nav class="space-y-2">
                            <button onclick="showSection('account')"
                                class="nav-btn w-full text-right px-4 py-3 rounded transition-colors hover:bg-gray-100">
                                👤 ویرایش حساب کاربری
                            </button>
                            <button onclick="showSection('orders')"
                                class="nav-btn w-full text-right px-4 py-3 rounded transition-colors hover:bg-gray-100">
                                📦 تاریخچه سفارشات
                            </button>
                            <button onclick="showSection('favorites')"
                                class="nav-btn w-full text-right px-4 py-3 rounded transition-colors hover:bg-gray-100">
                                ❤️ علاقه‌مندی‌ها
                            </button>
                            <button onclick="showSection('tickets')"
                                class="nav-btn w-full text-right px-4 py-3 rounded transition-colors bg-button-blue text-white">
                                🎫 مدیریت تیکت‌ها
                            </button>
                            <button onclick="showSection('notifications')"
                                class="nav-btn w-full text-right px-4 py-3 rounded transition-colors hover:bg-gray-100">
                                🔔 اعلانات
                            </button>
                        </nav>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="lg:col-span-3">
                    <!-- Account Editing Section -->
                    <div id="account" class="content-section">
                        <div class="bg-main-bg rounded-lg shadow-sm border p-8">
                            <h2 class="text-2xl font-bold text-main-text mb-6 flex items-center gap-3">
                                👤 ویرایش حساب کاربری
                            </h2>

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                                <!-- Personal Info -->
                                <div>
                                    <h3 class="text-lg font-semibold text-main-text mb-4">اطلاعات شخصی</h3>
                                    <form class="space-y-4" method="POST" action="{{ route('user.profile.update') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div>
                                            <label class=" text-sm font-medium text-main-text mb-2">نام</label>
                                            <input name="name" type="text" value="{{ $user->name }}"
                                                class="w-full px-4 py-3 border border-gray-300 rounded focus:ring-2 focus:ring-button-blue focus:border-button-blue outline-none">
                                        </div>
                                        <div>
                                            <label class=" text-sm font-medium text-main-text mb-2">آدرس ایمیل</label>
                                            <input type="email" name="email" value="{{ $user->email }}"
                                                class="w-full px-4 py-3 border border-gray-300 rounded focus:ring-2 focus:ring-button-blue focus:border-button-blue outline-none ltr"
                                                dir="ltr">
                                        </div>
                                        {{-- <div>
                                            <label class=" text-sm font-medium text-main-text mb-2">شماره تلفن</label>
                                            <input type="tel" value="09123456789"
                                                class="w-full px-4 py-3 border border-gray-300 rounded focus:ring-2 focus:ring-button-blue focus:border-button-blue outline-none ltr"
                                                dir="ltr">
                                        </div> --}}
                                        <button type="submit"
                                            class="bg-button-blue hover:bg-link-blue text-white px-6 py-3 rounded font-medium transition-colors">
                                            ذخیره تغییرات
                                        </button>
                                    </form>
                                </div>

                                <!-- Password Change -->
                                <div>
                                    <h3 class="text-lg font-semibold text-main-text mb-4">تغییر رمز عبور</h3>
                                    <form class="space-y-4" method="POST" action="{{ route('user.password.update') }}">
                                        @csrf

                                        <div>
                                            <label class="text-sm font-medium text-main-text mb-2">رمز عبور فعلی</label>
                                            <input type="password" name="current_password"
                                                class="w-full px-4 py-3 border border-gray-300 rounded focus:ring-2 focus:ring-button-blue focus:border-button-blue outline-none">
                                            @error('current_password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div>
                                            <label class="text-sm font-medium text-main-text mb-2">رمز عبور جدید</label>
                                            <input type="password" name="new_password"
                                                class="w-full px-4 py-3 border border-gray-300 rounded focus:ring-2 focus:ring-button-blue focus:border-button-blue outline-none">
                                            @error('new_password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div>
                                            <label class="text-sm font-medium text-main-text mb-2">تکرار رمز عبور
                                                جدید</label>
                                            <input type="password" name="new_password_confirmation"
                                                class="w-full px-4 py-3 border border-gray-300 rounded focus:ring-2 focus:ring-button-blue focus:border-button-blue outline-none">
                                        </div>

                                        <button type="submit"
                                            class="bg-button-blue hover:bg-link-blue text-white px-6 py-3 rounded font-medium transition-colors">
                                            تغییر رمز عبور
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Orders Section -->
                    <div id="orders" class="content-section hidden">
                        <div class="bg-main-bg rounded-lg shadow-sm border p-8">
                            <h2 class="text-2xl font-bold text-main-text mb-6 flex items-center gap-3">
                                📦 تاریخچه سفارشات
                            </h2>

                            <div class="space-y-4">
                                <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow">
                                    <div class="flex justify-between items-start mb-4">
                                        <div>
                                            <h3 class="font-semibold text-main-text">سفارش #۱۲۳۴۵</h3>
                                            <p class="text-sm text-gray-600">۲۵ دی ۱۴۰۲</p>
                                        </div>
                                        <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">تحویل
                                            شده</span>
                                    </div>
                                    <div class="space-y-2">
                                        <div class="flex justify-between">
                                            <span>آجیل مخلوط پریمیوم (۱ کیلو)</span>
                                            <span class="font-medium">۲۴۹,۰۰۰ تومان</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span>بادام ارگانیک (۵۰۰ گرم)</span>
                                            <span class="font-medium">۱۲۹,۰۰۰ تومان</span>
                                        </div>
                                    </div>
                                    <div
                                        class="border-t border-gray-200 mt-4 pt-4 flex justify-between font-bold text-main-text">
                                        <span>مجموع</span>
                                        <span>۳۷۸,۰۰۰ تومان</span>
                                    </div>
                                    <button class="mt-4 text-link-blue hover:text-button-blue transition-colors">مشاهده
                                        جزئیات</button>
                                </div>

                                <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow">
                                    <div class="flex justify-between items-start mb-4">
                                        <div>
                                            <h3 class="font-semibold text-main-text">سفارش #۱۲۳۴۴</h3>
                                            <p class="text-sm text-gray-600">۱۸ دی ۱۴۰۲</p>
                                        </div>
                                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">در حال
                                            ارسال</span>
                                    </div>
                                    <div class="space-y-2">
                                        <div class="flex justify-between">
                                            <span>بسته متنوع بادام هندی</span>
                                            <span class="font-medium">۱۹۹,۰۰۰ تومان</span>
                                        </div>
                                    </div>
                                    <div
                                        class="border-t border-gray-200 mt-4 pt-4 flex justify-between font-bold text-main-text">
                                        <span>مجموع</span>
                                        <span>۱۹۹,۰۰۰ تومان</span>
                                    </div>
                                    <button class="mt-4 text-link-blue hover:text-button-blue transition-colors">پیگیری
                                        سفارش</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Favorites Section -->
                    <div id="favorites" class="content-section hidden">
                        <div class="bg-main-bg rounded-lg shadow-sm border p-8">
                            <h2 class="text-2xl font-bold text-main-text mb-6 flex items-center gap-3">
                                ❤️ علاقه‌مندی‌ها
                            </h2>

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <div class="text-4xl text-center mb-3">🥜</div>
                                    <h3 class="font-semibold text-main-text text-center mb-2">آجیل مخلوط پریمیوم</h3>
                                    <p class="text-sm text-gray-600 text-center mb-3">ترکیب عالی از بادام، بادام هندی و
                                        گردو</p>
                                    <div class="text-center">
                                        <span class="text-lg font-bold text-main-text">۲۴۹,۰۰۰ تومان</span>
                                        <div class="flex gap-2 mt-3">
                                            <button
                                                class="flex-1 bg-button-blue hover:bg-link-blue text-white py-2 rounded transition-colors">
                                                افزودن به سبد
                                            </button>
                                            <button
                                                class="px-3 py-2 border border-gray-300 rounded hover:bg-gray-100 transition-colors">
                                                ❌
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <div class="text-4xl text-center mb-3">🌰</div>
                                    <h3 class="font-semibold text-main-text text-center mb-2">بادام ارگانیک</h3>
                                    <p class="text-sm text-gray-600 text-center mb-3">بادام خام و بدون نمک ارگانیک</p>
                                    <div class="text-center">
                                        <span class="text-lg font-bold text-main-text">۱۲۹,۰۰۰ تومان</span>
                                        <div class="flex gap-2 mt-3">
                                            <button
                                                class="flex-1 bg-button-blue hover:bg-link-blue text-white py-2 rounded transition-colors">
                                                افزودن به سبد
                                            </button>
                                            <button
                                                class="px-3 py-2 border border-gray-300 rounded hover:bg-gray-100 transition-colors">
                                                ❌
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <div class="text-4xl text-center mb-3">🥥</div>
                                    <h3 class="font-semibold text-main-text text-center mb-2">بسته متنوع بادام هندی</h3>
                                    <p class="text-sm text-gray-600 text-center mb-3">بادام هندی نمکی، برشته و عسلی</p>
                                    <div class="text-center">
                                        <span class="text-lg font-bold text-main-text">۱۹۹,۰۰۰ تومان</span>
                                        <div class="flex gap-2 mt-3">
                                            <button
                                                class="flex-1 bg-button-blue hover:bg-link-blue text-white py-2 rounded transition-colors">
                                                افزودن به سبد
                                            </button>
                                            <button
                                                class="px-3 py-2 border border-gray-300 rounded hover:bg-gray-100 transition-colors">
                                                ❌
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tickets Section -->
                    <div id="tickets" class="content-section">
                        <div class="bg-main-bg rounded-lg shadow-sm border p-8">
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-2xl font-bold text-main-text flex items-center gap-3">
                                    🎫 مدیریت تیکت‌ها
                                </h2>
                                <button onclick="showNewTicketForm()"
                                    class="bg-button-blue hover:bg-link-blue text-white px-4 py-2 rounded transition-colors">
                                    تیکت جدید
                                </button>
                            </div>

                            <!-- New Ticket Form -->
                            <div id="newTicketForm" class="hidden mb-6 p-6 border border-gray-200 rounded-lg">
                                <h3 class="text-lg font-semibold text-main-text mb-4">ایجاد تیکت جدید</h3>
                                <form class="space-y-4" method="POST" action="{{ route('Tiketspost') }}">
                                    @csrf
                                    <div>
                                        <label class=" text-sm font-medium text-main-text mb-2">موضوع</label>
                                        <input type="text" name="subject" placeholder="موضوع تیکت را وارد کنید"
                                            class="w-full px-4 py-3 border border-gray-300 rounded focus:ring-2 focus:ring-green-500 focus:border-green-500 hover:border-green-400 outline-none transition-colors">
                                    </div>
                                    <div>
                                        <label class=" text-sm font-medium text-main-text mb-2">دسته‌بندی</label>
                                        <select name="category"
                                            class="w-full px-4 py-3 border border-gray-300 rounded focus:ring-2 focus:ring-green-500 focus:border-green-500 hover:border-green-400 outline-none transition-colors">
                                            <option>پشتیبانی فنی</option>
                                            <option>مشکل در سفارش</option>
                                            <option>پیشنهاد</option>
                                            <option>شکایت</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class=" text-sm font-medium text-main-text mb-2">اولویت</label>
                                        <select name="priority"
                                            class="w-full px-4 py-3 border border-gray-300 rounded focus:ring-2 focus:ring-green-500 focus:border-green-500 hover:border-green-400 outline-none transition-colors">
                                            <option value="low">پایین</option>
                                            <option value="medium" selected>متوسط</option>
                                            <option value="high">بالا</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class=" text-sm font-medium text-main-text mb-2">پیام</label>
                                        <textarea name="message" rows="4" placeholder="پیام خود را بنویسید..."
                                            class="w-full px-4 py-3 border border-gray-300 rounded focus:ring-2 focus:ring-green-500 focus:border-green-500 hover:border-green-400 outline-none transition-colors"></textarea>
                                    </div>
                                    <div class="flex gap-3">
                                        <button type="submit"
                                            class="bg-button-blue hover:bg-link-blue text-white px-6 py-3 rounded transition-colors">
                                            ارسال تیکت
                                        </button>
                                        <button type="button" onclick="hideNewTicketForm()"
                                            class="border border-gray-300 text-main-text px-6 py-3 rounded hover:bg-gray-100 transition-colors">
                                            انصراف
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <!-- Filter Buttons -->
                            <div class="flex gap-3 mb-6">
                                <button onclick="filterTickets('all')"
                                    class="filter-btn bg-button-blue text-white px-4 py-2 rounded transition-colors">
                                    همه تیکت‌ها
                                </button>
                                <button onclick="filterTickets('pending')"
                                    class="filter-btn border border-gray-300 text-main-text px-4 py-2 rounded hover:bg-gray-100 transition-colors">
                                    در انتظار پاسخ
                                </button>
                                <button onclick="filterTickets('answered')"
                                    class="filter-btn border border-gray-300 text-main-text px-4 py-2 rounded hover:bg-gray-100 transition-colors">
                                    پاسخ داده شده
                                </button>
                                <button onclick="filterTickets('closed')"
                                    class="filter-btn border border-gray-300 text-main-text px-4 py-2 rounded hover:bg-gray-100 transition-colors">
                                    بسته شده
                                </button>
                            </div>

                            <!-- Tickets List -->
                            <div id="ticketsList" class="space-y-4">
                                @php
                                    use Morilog\Jalali\Jalalian;
                                @endphp
                                @foreach ($tickets as $ticket)
                                    <div class="ticket-item border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow"
                                        data-status="answered" data-priority="high">
                                        <div class="flex justify-between items-start mb-4">
                                            <div>
                                                <h3 class="font-semibold text-main-text"> {{ $ticket->subject }}</h3>
                                                <p class="text-sm text-gray-600">{{ Jalalian::fromDateTime($ticket->created_at)->format('Y/m/d') }}</p>
                                                <p class="text-xs text-gray-500 mt-1">دسته‌بندی: {{  $ticket->category }}</p>
                                            </div>
                                            <div class="flex flex-col items-end gap-2">
                                                <span
                                                    class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">پاسخ
                                                    داده شده</span>
                                                <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs">اولویت
                                                    {{  $ticket->priority }}</span>
                                            </div>
                                        </div>
                                        <p class="text-gray-700 mb-4">{{ substr($ticket->message,0,110)."..."  }}</p>
                                        <div class="flex gap-3">
                                            <button onclick="viewTicketDetails(1001)"
                                                class="text-link-blue hover:text-button-blue transition-colors">مشاهده
                                                پاسخ</button>
                                            <button onclick="closeTicket(1001)"
                                                class="text-gray-600 hover:text-gray-800 transition-colors">بستن
                                                تیکت</button>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                            <!-- Empty State -->
                            <div id="emptyState" class="hidden text-center py-12">
                                <div class="text-6xl mb-4">📝</div>
                                <h3 class="text-lg font-semibold text-main-text mb-2">تیکتی یافت نشد</h3>
                                <p class="text-gray-600">در این دسته‌بندی تیکتی وجود ندارد.</p>
                            </div>

                            <!-- Ticket Details Panel -->
                            <div id="ticketDetailsPanel"
                                class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
                                <div class="bg-white rounded-lg max-w-4xl w-full max-h-[90vh] overflow-y-auto">
                                    <div class="p-6 border-b border-gray-200">
                                        <div class="flex justify-between items-center">
                                            <h3 class="text-xl font-bold text-main-text">جزئیات تیکت</h3>
                                            <button onclick="closeTicketDetails()"
                                                class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
                                        </div>
                                    </div>
                                    <div id="ticketDetailsContent" class="p-6">
                                        <!-- Content will be populated by JavaScript -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Notifications Section -->
                    <div id="notifications" class="content-section hidden">
                        <div class="bg-main-bg rounded-lg shadow-sm border p-8">
                            <h2 class="text-2xl font-bold text-main-text mb-6 flex items-center gap-3">
                                🔔 اعلانات
                            </h2>

                            <div class="space-y-4">
                                <div
                                    class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow bg-blue-50">
                                    <div class="flex justify-between items-start mb-2">
                                        <h3 class="font-semibold text-main-text">پاسخ تیکت شما</h3>
                                        <span class="text-sm text-gray-600">۲ ساعت پیش</span>
                                    </div>
                                    <p class="text-gray-700">تیکت شماره ۱۰۰۱ شما پاسخ داده شد. برای مشاهده کلیک کنید.</p>
                                    <button class="mt-3 text-link-blue hover:text-button-blue transition-colors">مشاهده
                                        پاسخ</button>
                                </div>

                                <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow">
                                    <div class="flex justify-between items-start mb-2">
                                        <h3 class="font-semibold text-main-text">تخفیف ویژه</h3>
                                        <span class="text-sm text-gray-600">۱ روز پیش</span>
                                    </div>
                                    <p class="text-gray-700">تخفیف ۲۰٪ برای تمام محصولات آجیل تا پایان هفته!</p>
                                    <button class="mt-3 text-link-blue hover:text-button-blue transition-colors">مشاهده
                                        محصولات</button>
                                </div>

                                <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow">
                                    <div class="flex justify-between items-start mb-2">
                                        <h3 class="font-semibold text-main-text">ارسال سفارش</h3>
                                        <span class="text-sm text-gray-600">۳ روز پیش</span>
                                    </div>
                                    <p class="text-gray-700">سفارش شماره ۱۲۳۴۴ شما ارسال شد و تا ۲ روز آینده تحویل خواهد
                                        شد.</p>
                                    <button class="mt-3 text-link-blue hover:text-button-blue transition-colors">پیگیری
                                        سفارش</button>
                                </div>

                                <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow">
                                    <div class="flex justify-between items-start mb-2">
                                        <h3 class="font-semibold text-main-text">محصول جدید</h3>
                                        <span class="text-sm text-gray-600">۱ هفته پیش</span>
                                    </div>
                                    <p class="text-gray-700">محصول جدید "آجیل مخصوص شب یلدا" به فروشگاه اضافه شد.</p>
                                    <button class="mt-3 text-link-blue hover:text-button-blue transition-colors">مشاهده
                                        محصول</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function showSection(sectionName) {
                // Hide all sections
                document.querySelectorAll('.content-section').forEach(section => {
                    section.classList.add('hidden');
                });

                // Show selected section
                document.getElementById(sectionName).classList.remove('hidden');

                // Update navigation buttons
                document.querySelectorAll('.nav-btn').forEach(btn => {
                    btn.classList.remove('bg-button-blue', 'text-white');
                    btn.classList.add('hover:bg-gray-100');
                });

                // Highlight active button
                event.target.classList.add('bg-button-blue', 'text-white');
                event.target.classList.remove('hover:bg-gray-100');
            }

            function showNewTicketForm() {
                document.getElementById('newTicketForm').classList.remove('hidden');
            }

            function hideNewTicketForm() {
                document.getElementById('newTicketForm').classList.add('hidden');
            }

            // Ticket Management Functions
            function filterTickets(status) {
                const tickets = document.querySelectorAll('.ticket-item');
                const emptyState = document.getElementById('emptyState');
                let visibleCount = 0;

                // Update filter buttons
                document.querySelectorAll('.filter-btn').forEach(btn => {
                    btn.classList.remove('bg-button-blue', 'text-white');
                    btn.classList.add('border', 'border-gray-300', 'text-main-text', 'hover:bg-gray-100');
                });
                event.target.classList.remove('border', 'border-gray-300', 'text-main-text', 'hover:bg-gray-100');
                event.target.classList.add('bg-button-blue', 'text-white');

                // Filter tickets
                tickets.forEach(ticket => {
                    if (status === 'all' || ticket.dataset.status === status) {
                        ticket.style.display = '';
                        visibleCount++;
                    } else {
                        ticket.style.display = 'none';
                    }
                });

                // Show/hide empty state
                if (visibleCount === 0) {
                    emptyState.classList.remove('hidden');
                } else {
                    emptyState.classList.add('hidden');
                }
            }

            function viewTicketDetails(ticketId) {
                const ticketData = {
                    1001: {
                        subject: 'مشکل در پرداخت',
                        status: 'پاسخ داده شده',
                        priority: 'بالا',
                        category: 'مشکل در سفارش',
                        date: '۲۳ دی ۱۴۰۲',
                        messages: [{
                                sender: 'شما',
                                time: '۲۳ دی ۱۴۰۲ - ۱۰:۳۰',
                                message: 'سلام، در هنگام پرداخت با مشکل مواجه شدم و پول از حساب کسر شد اما سفارش ثبت نشد.'
                            },
                            {
                                sender: 'پشتیبانی',
                                time: '۲۳ دی ۱۴۰۲ - ۱۴:۱۵',
                                message: 'سلام و وقت بخیر. بابت این مشکل عذرخواهی می‌کنیم. لطفاً شماره تراکنش را ارسال کنید تا بررسی کنیم.'
                            },
                            {
                                sender: 'شما',
                                time: '۲۳ دی ۱۴۰۲ - ۱۵:۰۰',
                                message: 'شماره تراکنش: ۱۲۳۴۵۶۷۸۹'
                            },
                            {
                                sender: 'پشتیبانی',
                                time: '۲۳ دی ۱۴۰۲ - ۱۶:۳۰',
                                message: 'تراکنش شما بررسی شد. مبلغ به حساب شما برگشت داده شده است. سفارش شما نیز ثبت شد و کد پیگیری: ۹۸۷۶۵۴۳۲۱'
                            }
                        ]
                    },
                    1002: {
                        subject: 'پیشنهاد محصول جدید',
                        status: 'در انتظار پاسخ',
                        priority: 'متوسط',
                        category: 'پیشنهاد',
                        date: '۲۰ دی ۱۴۰۲',
                        messages: [{
                            sender: 'شما',
                            time: '۲۰ دی ۱۴۰۲ - ۰۹:۱۵',
                            message: 'آیا امکان اضافه کردن پسته اکبری به محصولات وجود دارد؟'
                        }]
                    },
                    1003: {
                        subject: 'سوال درباره ارسال',
                        status: 'پاسخ داده شده',
                        priority: 'پایین',
                        category: 'پشتیبانی فنی',
                        date: '۱۵ دی ۱۴۰۲',
                        messages: [{
                                sender: 'شما',
                                time: '۱۵ دی ۱۴۰۲ - ۱۱:۰۰',
                                message: 'چه مدت زمان برای ارسال به شهرستان نیاز است؟'
                            },
                            {
                                sender: 'پشتیبانی',
                                time: '۱۵ دی ۱۴۰۲ - ۱۳:۴۵',
                                message: 'سلام. ارسال به شهرستان معمولاً ۳ تا ۵ روز کاری زمان می‌برد. برای شهرهای دورتر ممکن است تا ۷ روز طول بکشد.'
                            }
                        ]
                    },
                    1004: {
                        subject: 'درخواست مرجوعی',
                        status: 'بسته شده',
                        priority: 'متوسط',
                        category: 'شکایت',
                        date: '۱۰ دی ۱۴۰۲',
                        messages: [{
                                sender: 'شما',
                                time: '۱۰ دی ۱۴۰۲ - ۱۶:۲۰',
                                message: 'محصول دریافتی با سفارش من مطابقت ندارد و درخواست مرجوعی دارم.'
                            },
                            {
                                sender: 'پشتیبانی',
                                time: '۱۱ دی ۱۴۰۲ - ۰۹:۳۰',
                                message: 'سلام. بابت این اشتباه عذرخواهی می‌کنیم. لطفاً آدرس خود را ارسال کنید تا محصول را تحویل بگیریم.'
                            },
                            {
                                sender: 'شما',
                                time: '۱۱ دی ۱۴۰۲ - ۱۰:۰۰',
                                message: 'آدرس: تهران، خیابان ولیعصر، پلاک ۱۲۳'
                            },
                            {
                                sender: 'پشتیبانی',
                                time: '۱۲ دی ۱۴۰۲ - ۱۴:۰۰',
                                message: 'محصول تحویل گرفته شد و محصول صحیح ارسال شده است. مشکل حل شد.'
                            }
                        ]
                    },
                    1005: {
                        subject: 'مشکل فوری در تحویل',
                        status: 'در انتظار پاسخ',
                        priority: 'بالا',
                        category: 'مشکل در سفارش',
                        date: '۲۴ دی ۱۴۰۲',
                        messages: [{
                            sender: 'شما',
                            time: '۲۴ دی ۱۴۰۲ - ۰۸:۰۰',
                            message: 'سفارش من ۳ روز تاخیر دارد و نیاز فوری به آن دارم.'
                        }]
                    }
                };

                const ticket = ticketData[ticketId];
                if (!ticket) return;

                const statusColors = {
                    'پاسخ داده شده': 'bg-green-100 text-green-800',
                    'در انتظار پاسخ': 'bg-yellow-100 text-yellow-800',
                    'بسته شده': 'bg-gray-100 text-gray-800'
                };

                const priorityColors = {
                    'پایین': 'bg-green-100 text-green-800',
                    'متوسط': 'bg-yellow-100 text-yellow-800',
                    'بالا': 'bg-red-100 text-red-800'
                };

                const content = `
                <div class="mb-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h4 class="text-xl font-bold text-main-text">${ticket.subject}</h4>
                            <p class="text-gray-600">تیکت #${ticketId} - ${ticket.date}</p>
                            <p class="text-sm text-gray-500">دسته‌بندی: ${ticket.category}</p>
                        </div>
                        <div class="flex flex-col gap-2">
                            <span class="${statusColors[ticket.status]} px-3 py-1 rounded-full text-sm">${ticket.status}</span>
                            <span class="${priorityColors[ticket.priority]} px-2 py-1 rounded text-xs">اولویت ${ticket.priority}</span>
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <h5 class="font-semibold text-main-text border-b pb-2">تاریخچه مکالمات</h5>
                    ${ticket.messages.map(msg => `
                                        <div class="border rounded-lg p-4 ${msg.sender === 'شما' ? 'bg-blue-50 mr-8' : 'bg-gray-50 ml-8'}">
                                            <div class="flex justify-between items-center mb-2">
                                                <span class="font-medium ${msg.sender === 'شما' ? 'text-blue-700' : 'text-green-700'}">${msg.sender}</span>
                                                <span class="text-sm text-gray-500">${msg.time}</span>
                                            </div>
                                            <p class="text-gray-700">${msg.message}</p>
                                        </div>
                                    `).join('')}
                </div>

                ${ticket.status !== 'بسته شده' ? `
                                    <div class="mt-6 border-t pt-6">
                                        <h5 class="font-semibold text-main-text mb-3">پاسخ جدید</h5>
                                        <textarea rows="3" placeholder="پیام خود را بنویسید..." class="w-full px-4 py-3 border border-gray-300 rounded focus:ring-2 focus:ring-green-500 focus:border-green-500 hover:border-green-400 outline-none transition-colors mb-3"></textarea>
                                        <button onclick="sendReply(${ticketId})" class="bg-button-blue hover:bg-link-blue text-white px-4 py-2 rounded transition-colors">ارسال پاسخ</button>
                                    </div>
                                ` : ''}
            `;

                document.getElementById('ticketDetailsContent').innerHTML = content;
                document.getElementById('ticketDetailsPanel').classList.remove('hidden');
            }

            function closeTicketDetails() {
                document.getElementById('ticketDetailsPanel').classList.add('hidden');
            }

            function sendReply(ticketId) {
                const textarea = document.querySelector('#ticketDetailsPanel textarea');
                if (textarea && textarea.value.trim()) {
                    alert(
                        `پاسخ شما برای تیکت #${ticketId} ارسال شد:\n\n"${textarea.value}"\n\nتیم پشتیبانی در اسرع وقت پاسخ خواهد داد.`
                        );
                    textarea.value = '';
                    closeTicketDetails();
                }
            }

            function closeTicket(ticketId) {
                if (confirm(`آیا می‌خواهید تیکت #${ticketId} را بسته کنید؟`)) {
                    const ticket = document.querySelector(`[onclick*="${ticketId}"]`).closest('.ticket-item');
                    ticket.dataset.status = 'closed';

                    // Update status badge
                    const statusBadge = ticket.querySelector('.bg-green-100, .bg-yellow-100');
                    statusBadge.className = 'bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm';
                    statusBadge.textContent = 'بسته شده';

                    alert('تیکت با موفقیت بسته شد.');
                }
            }

            function addFollowUp(ticketId) {
                const followUp = prompt(`پیگیری برای تیکت #${ticketId}:\n\nپیام پیگیری خود را وارد کنید:`);
                if (followUp && followUp.trim()) {
                    alert(
                        `پیگیری شما برای تیکت #${ticketId} ثبت شد:\n\n"${followUp}"\n\nتیم پشتیبانی در اسرع وقت پاسخ خواهد داد.`
                        );
                }
            }

            // Logout functionality
            document.getElementById('logoutBtn').addEventListener('click', function() {
                if (confirm('آیا مطمئن هستید که می‌خواهید خروج کنید؟')) {
                    alert('با موفقیت خارج شدید!');
                }
            });

            // Form submissions
            document.querySelectorAll('form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    if (this.querySelector('textarea')) {
                        // Generate new ticket ID
                        const newTicketId = Math.floor(Math.random() * 9000) + 1000;
                        const subject = this.querySelector('input[type="text"]').value;
                        const category = this.querySelector('select').value;
                        const priority = this.querySelectorAll('select')[1].value;
                        const message = this.querySelector('textarea').value;

                        // Create new ticket element
                        const newTicket = document.createElement('div');
                        newTicket.className =
                            'ticket-item border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow';
                        newTicket.dataset.status = 'pending';
                        newTicket.dataset.priority = priority;

                        const priorityColors = {
                            'low': 'bg-green-100 text-green-800',
                            'medium': 'bg-yellow-100 text-yellow-800',
                            'high': 'bg-red-100 text-red-800'
                        };

                        const priorityText = {
                            'low': 'پایین',
                            'medium': 'متوسط',
                            'high': 'بالا'
                        };

                        newTicket.innerHTML = `
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="font-semibold text-main-text">${subject}</h3>
                                <p class="text-sm text-gray-600">تیکت #${newTicketId} - امروز - اولویت: ${priorityText[priority]}</p>
                                <p class="text-xs text-gray-500 mt-1">دسته‌بندی: ${category}</p>
                            </div>
                            <div class="flex flex-col items-end gap-2">
                                <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm">در انتظار پاسخ</span>
                                <span class="${priorityColors[priority]} px-2 py-1 rounded text-xs">اولویت ${priorityText[priority]}</span>
                            </div>
                        </div>
                        <p class="text-gray-700 mb-4">${message}</p>
                        <div class="flex gap-3">
                            <button onclick="viewTicketDetails(${newTicketId})" class="text-link-blue hover:text-button-blue transition-colors">مشاهده جزئیات</button>
                            <button onclick="addFollowUp(${newTicketId})" class="text-gray-600 hover:text-gray-800 transition-colors">پیگیری</button>
                        </div>
                    `;

                        // Add to tickets list
                        document.getElementById('ticketsList').insertBefore(newTicket, document.getElementById(
                            'ticketsList').firstChild);

                        alert(`تیکت #${newTicketId} با موفقیت ارسال شد!`);
                        hideNewTicketForm();
                        this.reset();
                    } else {
                        alert('تغییرات با موفقیت ذخیره شد!');
                    }
                });
            });

            // Add to cart functionality
            document.querySelectorAll('button').forEach(button => {
                if (button.textContent.includes('افزودن به سبد')) {
                    button.addEventListener('click', function() {
                        alert('محصول به سبد خرید اضافه شد!');
                    });
                }
            });

            // Remove from favorites
            document.querySelectorAll('button').forEach(button => {
                if (button.textContent.includes('❌')) {
                    button.addEventListener('click', function() {
                        if (confirm('آیا می‌خواهید این محصول را از علاقه‌مندی‌ها حذف کنید؟')) {
                            button.closest('.border').remove();
                        }
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
                            "window.__CF$cv$params={r:'9793d985d450bb9b',t:'MTc1Njg4Nzg1NS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
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
@endsection
