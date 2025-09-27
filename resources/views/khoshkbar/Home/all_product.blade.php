@extends('khoshkbar.layout.master')

@section('content')
    <section class="container-fluid inner-section">
        <div class="container p-0">
            <div class="row page-products">
                <div class="col-12 col-lg-3 col-md-4 ps-0 sticky_column">
                    <!--نمایش فیلتر در حالت گوشی-->
                    <div class="row d-xl-none d-lg-none d-md-none mt-2 mb-3">
                        <div class="col-6 ps-0 pe-2">
                            <button class="btn btn-primary filter-mob" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                <i class="fad fa-sliders-h"></i>
                                جستجو پیشرفته
                            </button>
                        </div>
                        <div class="col-6 pe-0 ps-2">
                            <form action="{{ route('All_product') }}" method="GET">
                                <div class="btn-filter d-flex align-items-center">
                                    <label class="icon-sort me-2">
                                        مرتب سازی بر اساس :
                                    </label>
                                    <select name="sort" onchange="this.form.submit()"
                                        style="padding: 10px 12px;
                       border-radius: 12px;
                       background: white;
                       border: 1px solid #ccc;
                       max-width: 140px;
                       width: 100%;">
                                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>جدیدترین
                                        </option>
                                        <option value="cheapest" {{ request('sort') == 'cheapest' ? 'selected' : '' }}>
                                            ارزان‌ترین</option>
                                        <option value="most_expensive"
                                            {{ request('sort') == 'most_expensive' ? 'selected' : '' }}>گران‌ترین</option>
                                        <option value="is_suggested"
                                            {{ request('sort') == 'is_suggested' ? 'selected' : '' }}>پیشنهادی</option>
                                    </select>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="row d-xl-none d-lg-none d-md-none mt-2 mb-3">
                        <div class="col-12 p-0">
                            <div class="icon-col px-3">
                                <div class="row">
                                    <div class="col">
                                        <div class="product-custom-banner-text text-start">
                                            <div class="product-icon-h4">ارسال رایگان سفارش</div>
                                            <div class="product-icon-h5">سفارش‌های بالای ۳۰۰ هزار تومان</div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="product-custom-banner-image text-center">
                                            <img src="{{ asset('Assets/images/free-delivery-free.svg') }}"
                                                alt="ارسال رایگان سفارش" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasRight"
                        aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                            <h5 id="offcanvasRightLabel">فیلتر نتایج</h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div class="panel panel-default filter_pannel ">
                                <ul>
                                    <form action="{{ route('All_product') }}" method="GET">
                                        <!-- سایر فیلترها -->
                                        <li class="block cat-filter">
                                            <label class="c-ui-statusswitcher">
                                                <input type="checkbox" name="only_available" value="1"
                                                    {{ request('only_available') == '1' ? 'checked' : '' }}
                                                    onchange="this.form.submit()">
                                                <span class="c-ui-statusswitcher__slider">
                                                    <span class="c-ui-statusswitcher__slider__toggle"></span>
                                                </span>
                                            </label>
                                            <span class="status"> فقط کالاهای موجود</span>
                                        </li>
                                    </form>
                                    <li class="block cat-filter scroll">
                                        <input type="checkbox" name="item" id="off_filter_part">
                                        <i></i>
                                        <label class="filter-cation" for="off_filter_part">دسته بندی ها</label>
                                        <div class="options">
                                            <ul class="li-item">
                                                @foreach ($categorys as $category)
                                                    <li>
                                                        <label class="checkbox-icon customradio">
                                                            <input type="checkbox" name="categories[]"
                                                                value="{{ $category->id }}" class="category-filter">
                                                            <span class="logo-brand">{{ $category->name }}</span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </li>
                                    <li class="block cat-filter">
                                        <input type="checkbox" name="item" id="cost_filter_part">
                                        <i></i>
                                        <label class="filter-cation" for="cost_filter_part">محدوه قیمت</label>
                                        <div class="options">
                                            <div class="double-handle-slider-mob"></div>
                                            <ul class="cost-rang">
                                                <li>
                                                    <p class="lbl-prise"> از</p>
                                                    <input type="number" class="min-value-mob" value="" />
                                                    <p>تومان</p>
                                                </li>
                                                <li>
                                                    <p class="lbl-prise">تا</p>
                                                    <input type="number" class="max-value-mob" value="" />
                                                    <p>تومان</p>
                                                </li>
                                            </ul>
                                            <p class="btn-action text-center">
                                                <button type="button" class="btn btn-primary btn-sm apply-price-filter">
                                                    <span>اعمال محدوده قیمت مورد نظر</span>
                                                </button>
                                            </p>
                                        </div>
                                    </li>


                                </ul>

                            </div>
                        </div>
                    </div>
                    <!--نمایش فیلتر در حالت دسکتاپ-->
                    <div class="row d-none d-md-block">
                        <div class="col-12 p-0">
                            <div class="panel panel-default filter_pannel ">
                                <ul>
                                    <li class="block cat-filter">
                                        <div class="owl-slide">
                                            <div class="block-headline">
                                                <span>پیشنهاد لحظه ایی</span>
                                            </div>
                                            <div class="slide-progress"></div>
                                            <div class="owl-carousel owl-wnd-process  owl-theme">
                                                @foreach ($productsuggesteds as $productsuggested)
                                                    <div class="item">
                                                        @php
                                                            $discount = $productsuggested->activeDiscount();
                                                            $price = $productsuggested->discountedPrice();
                                                        @endphp

                                                        @if ($discount && $discount->type === 'percent')
                                                            <span class="offer">
                                                                <span class="off">
                                                                    {{ round($discount->value, 0) . '%' }}
                                                                </span>
                                                            </span>
                                                        @endif
                                                        <div class="item-img">
                                                            <div class="row">
                                                                <div class="col-12 p-0">
                                                                    <a href="{{ route('Product', $productsuggested->id) }}"
                                                                        class="img-pro" target="_blank">
                                                                        <div class="dark-overlay removeFocusIndicator">
                                                                        </div>
                                                                        <img src="{{ asset('AdminAssets.Product-image/' . $productsuggested->image) }}"
                                                                            alt="" />
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-12 text-center pro-name p-0">
                                                                <a href="{{ route('Product', $productsuggested->id) }}">
                                                                    {{ $productsuggested->name }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-md-4 d-none d-md-block cost text-left">
                                                            </div>
                                                            <div class="col-md-8 col-12 cost text-end pl-0">
                                                              @if ($price > 0)
                                        @if ($productsuggested->activeDiscount())
                                            <span class="old-cost">{{ number_format($productsuggested->price) }}</span>
                                            <br>
                                            <span class="cost-total">{{ number_format($price) }}</span> <span
                                                class="unit">تومان</span>
                                        @else
                                            <span class="cost-total">{{ number_format($productsuggested->price) }}</span>
                                            <span class="unit">تومان</span>
                                            <br>
                                            <br>
                                        @endif
                                    @else
                                        <span class="text-danger cost-total ">ناموجود</span>
                                        <br>
                                        <br>
                                    @endif

                                                            </div>

                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </li>
                                    <li class="block col-sale">
                                        <div class="icon-col px-3">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="product-custom-banner-text text-start">
                                                        <div class="product-icon-h4">ارسال رایگان سفارش</div>
                                                        <div class="product-icon-h5">سفارش‌های بالای ۳۰۰ هزار تومان</div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="product-custom-banner-image text-center">
                                                        <img src="{{ asset('Assets/images/free-delivery-free.svg') }}"
                                                            alt="ارسال رایگان سفارش" class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <form action="{{ route('All_product') }}" method="GET">
                                        <!-- سایر فیلترها -->
                                        <li class="block cat-filter">
                                            <label class="c-ui-statusswitcher">
                                                <input type="checkbox" name="only_available" value="1"
                                                    {{ request('only_available') == '1' ? 'checked' : '' }}
                                                    onchange="this.form.submit()">
                                                <span class="c-ui-statusswitcher__slider">
                                                    <span class="c-ui-statusswitcher__slider__toggle"></span>
                                                </span>
                                            </label>
                                            <span class="status"> فقط کالاهای موجود</span>
                                        </li>
                                    </form>
                                    <li class="block cat-filter scroll">
                                        <input type="checkbox" name="item" id="off_filter_part2" checked="checked">
                                        <i></i>
                                        <label class="filter-cation" for="off_filter_part2">دسته بندی </label>

                                        <div class="options">
                                            <ul class="li-item">
                                                @foreach ($categorys as $category)
                                                    <li>
                                                        <label class="checkbox-icon customradio">
                                                            <input type="checkbox" name="categories[]"
                                                                value="{{ $category->id }}" class="category-filter">
                                                            <span class="logo-brand">{{ $category->name }}</span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </li>
                                    <li class="block cat-filter">
                                        <input type="checkbox" name="item" id="cost_filter_part2" checked="checked">
                                        <i></i>
                                        <label class="filter-cation" for="cost_filter_part2">جستجو بر اساس قیمت
                                            محصول</label>
                                        <div class="options">
                                            <div class="double-handle-slider-desc"></div>
                                            <ul class="cost-rang">
                                                <li>
                                                    <p class="lbl-prise">از</p>
                                                    <input type="number" class="min-value-desc" value="0" />
                                                    <p>تومان</p>
                                                </li>
                                                <li>
                                                    <p class="lbl-prise">تا</p>
                                                    <input type="number" class="max-value-desc" value="10000" />
                                                    <p>تومان</p>
                                                </li>
                                            </ul>
                                            <p class="btn-action text-center">
                                                <button type="button" class="btn btn-primary btn-sm apply-price-filter">
                                                    <span>اعمال محدوده قیمت مورد نظر</span>
                                                </button>
                                            </p>
                                        </div>
                                    </li>

                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-9 col-md-8 p-0">
                    <div class="row row-filter-desc align-items-center">
                        <div class="col-md-4 col-lg-4 col-xl-4 ps-0">
                            <form action="{{ route('All_product') }}" method="GET" class="f-search search-filter">
                                <input type="text" value="{{ request('search') }}" name="search"
                                    class="input-search" placeholder="جستجو">
                                <input type="hidden" name="sort" value="{{ request('sort', 'newest') }}">
                                <button class="btn-search">
                                    <i class="fal fa-search"></i>
                                </button>

                            </form>
                        </div>
                        <div class="col-md-7 col-lg-7 col-xl-8 pe-0 text-end">
                            <form action="{{ route('All_product') }}" method="GET">
                                <div class="btn-filter">
                                    <label class="icon-sort">
                                        مرتب سازی بر اساس : </label>
                                    <select name="sort" onchange="this.form.submit()"
                                        style="padding: 12px;
  border-radius: 12px;
   background: white;
            max-width: 127px;
            width: 100%;">
                                        <option class="sort_label" value="newest"
                                            {{ request('sort') == 'newest' ? 'selected' : '' }}>جدیدترین</option>
                                        <option class="sort_label" value="newest"
                                            {{ request('sort') == 'newest' ? 'selected' : '' }}>جدیدترین</option>
                                        <option value="cheapest" {{ request('sort') == 'cheapest' ? 'selected' : '' }}>
                                            ارزان‌ترین</option>
                                        <option value="most_expensive"
                                            {{ request('sort') == 'most_expensive' ? 'selected' : '' }}>گران‌ترین</option>
                                        <option value="is_suggested"
                                            {{ request('sort') == 'is_suggested' ? 'selected' : '' }}>پیشنهادی</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div id="product-list">
                        @include('khoshkbar.Home.partials', ['products' => $products])

                    </div>
                    <div class="row mt-2 mb-2">
                        <div class="col-12 posts-view-pagination">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-6">
                                    <ul class="paginat">
                                        {{-- لینک قبلی --}}
                                        @if ($products->onFirstPage())
                                            <li><a href="#" class="disabled">
                                                    < </li>
                                                    @else
                                            <li><a href="{{ $products->previousPageUrl() }}">
                                                    < </li>
                                        @endif

                                        {{-- لینک شماره صفحات --}}
                                        @for ($i = 1; $i <= $products->lastPage(); $i++)
                                            @if ($i == $products->currentPage())
                                                <li class="active"><a href="#">{{ $i }}</a></li>
                                            @else
                                                <li><a href="{{ $products->url($i) }}">{{ $i }}</a></li>
                                            @endif
                                        @endfor

                                        {{-- لینک بعدی --}}
                                        @if ($products->hasMorePages())
                                            <li><a href="{{ $products->nextPageUrl() }}">></a></li>
                                        @else
                                            <li><a href="#" class="disabled">></a></li>
                                        @endif
                                    </ul>

                                </div>
                                <div class="col-12 col-md-6 text-end">
                                    {{-- <div class="page-item"><span>مجموع نتایج : {{ count($all_product->id ) }}</span></div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12  product-top">
                    <div class="c-desc-wrapper">
                        <div class="about-company c-desc my-white-box my-text-style my-trim-text">
                            <h2 dir="rtl" style="text-align: justify;">خرید خشکبار تازه و باکیفیت از امجد</h2>
                            <p style="text-align: justify;">
                                خشکبار امجد با سال‌ها تجربه در عرضه مستقیم خشکبار تازه و مرغوب، تلاش می‌کند محصولاتی سالم،
                                خوش‌طعم و باکیفیت را در اختیار شما قرار دهد. ما مفتخریم که با تأمین مستقیم از کشاورزان و
                                تولیدکنندگان معتبر، امکان خرید <strong>خشکبار اصل ایرانی</strong> را با بهترین قیمت فراهم
                                کرده‌ایم.

                                در فروشگاه آنلاین خشکبار امجد می‌توانید انواع پسته، بادام، فندق، گردو، خرما، توت خشک، کشمش و
                                سایر محصولات خشکبار را به صورت بسته‌بندی بهداشتی و با وزن‌های مختلف سفارش دهید.

                                اگر قصد <strong> خرید عمده خشکبار</strong> دارید، امجد بهترین انتخاب شماست؛ زیرا علاوه بر
                                تنوع بالا و کیفیت
                                تضمین‌شده، قیمت‌ها به‌صرفه و رقابتی ارائه می‌شود. ما اعتقاد داریم که مشتریان ما شایسته
                                بهترین‌ها هستند و به همین دلیل تمام محصولات قبل از ارسال، کنترل کیفیت می‌شوند تا با خیال
                                راحت خرید کنید.

                                با انتخاب خشکبار امجد، طعم اصالت و سلامت را به خانه بیاورید.
                            </p>
                        </div>
                    </div>
                    <div class="row mt-3 mb-3">
                        <div class="col-sm-12 col-xs-12 more-view-info shaodow">
                            <button class="c-more-info more more-desc-info">
                                <span class="mores">مشاهده بیشتر</span>
                                <span class="less">مشاهده کمتر </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <script src="{{ asset('Assets/js/category-main.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            // ساخت اسلایدر قیمت
            var slider = document.querySelector('.double-handle-slider-desc');
            var minInput = document.querySelector('.min-value-desc');
            var maxInput = document.querySelector('.max-value-desc');

            noUiSlider.create(slider, {
                start: [0, 20000000],
                connect: true,
                tooltips: [true, true],
                step: 20000,
                range: {
                    min: 0,
                    max: 20000000
                },
                direction: 'rtl',
                format: wNumb({
                    decimals: 0
                })
            });

            // بروز رسانی input ها هنگام حرکت اسلایدر
            slider.noUiSlider.on('update', function(values) {
                minInput.value = Math.round(values[0]);
                maxInput.value = Math.round(values[1]);
            });

            // تغییر اسلایدر با تغییر input ها
            minInput.addEventListener('change', function() {
                slider.noUiSlider.set([this.value, null]);
            });

            maxInput.addEventListener('change', function() {
                slider.noUiSlider.set([null, this.value]);
            });

            // اعمال فیلتر با کلیک روی دکمه

        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.apply-price-filter', function() {
                // بررسی اینکه از موبایل یا دسکتاپ استفاده می‌کنیم
                let parent = $(this).closest('.cat-filter');
                let minInput = parent.find('input.min-value-desc, input.min-value-mob');
                let maxInput = parent.find('input.max-value-desc, input.max-value-mob');

                let minPrice = minInput.val();
                let maxPrice = maxInput.val();

                $.ajax({
                    url: "{{ route('products.filterprice') }}",
                    type: "GET",
                    data: {
                        min_price: minPrice,
                        max_price: maxPrice
                    },
                    success: function(data) {
                        $('#product-list').html(data); // جایگزین کردن لیست محصولات
                    },
                    error: function(err) {
                        console.error("خطا در فیلتر قیمت:", err);
                    }
                });
            });
        });
    </script>
    <script>
        //تسلایدر پیشنهاد شگفت انگیز
        $(document).ready(function() {
            $(".owl-wnd-process").owlCarousel({
                items: 1,
                loop: true,
                rtl: !0,
                margin: 0,
                autoplay: true,
                dots: !1,
                nav: !1,
                autoPlay: !0,
                autoplayHoverPause: !1,
                responsiveClass: !0,
                onInitialized: startProgressBar,
                onTranslate: resetProgressBar,
                onTranslated: startProgressBar,
            });
        });

        function startProgressBar() {
            $(".slide-progress").css({
                width: "90%",
                transition: "width 5000ms"
            });
        }

        function resetProgressBar() {
            $(".slide-progress").css({
                width: 0,
                transition: "width 0s"
            });
        }
    </script>

    <script>
        //توضیحات انتهای صفحه
        $(document).ready(function() {
            "use strict";
            var descMinHeight = 160;
            var desc = $('.c-desc');
            var descWrapper = $('.c-desc-wrapper');
            if (desc.height() > descWrapper.height()) {
                $('.c-more-info').show();
            }

            $('.c-more-info').click(function() {

                var fullHeight = $('.c-desc').height();

                if ($(this).hasClass('expand')) {
                    // contract
                    $('.c-desc-wrapper').animate({
                        'height': descMinHeight
                    }, 'slow');
                    $('.more-view-info').addClass('shaodow');
                } else {
                    // expand 
                    $('.c-desc-wrapper').css({
                        'height': descMinHeight,
                        'max-height': 'none'
                    }).animate({
                        'height': fullHeight
                    }, 'slow');
                    $('.more-view-info').removeClass('shaodow');
                }

                $(this).toggleClass('expand');
                return false;
            });

        });
    </script>
    <script>
        // فیکس شدن فیلتر سمت راست
        if (matchMedia('only screen and (min-width:768px)').matches) {
            function sticky_sidebar() {
                $('.sticky_column')
                    .theiaStickySidebar({
                        //additionalMarginTop: 100
                    });
            }
            jQuery(document).ready(function() {
                sticky_sidebar()
            });
        }
    </script>
    <script>
        $('#significantLayout2').countdown({
            isRTL: true,
            labels: ['ثانیه', 'دقیقه', 'ساعت'],
            compactLabels: ['y', 'm', 'w', 'd', 'h', 'm', 's'],
            until: '+2h +1m +15s',
            layout: '{hn} ساعت, {mn} دقیقه, {sn}ثانیه'
        });
    </script>

    <script>
        $(document).on('change', '.category-filter', function() {
            let categories = [];
            $('.category-filter:checked').each(function() {
                categories.push($(this).val());
            });

            $.ajax({
                url: "{{ route('products.filtercategories') }}",
                type: "GET",
                data: {
                    categories: categories
                },
                success: function(data) {
                    $('#product-list').html(data);
                }
            });
        });
    </script>
@endsection
