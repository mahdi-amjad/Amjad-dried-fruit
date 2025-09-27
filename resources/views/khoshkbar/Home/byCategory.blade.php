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
                            <button data-bs-toggle="modal" data-bs-target="#sortModal" class="btn btn-sort"><i
                                    class="fad fa-sort-amount-up"></i>مرتب سازی</button>
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
                                            <img src="\public\Assets\images\free-delivery-free.svg" alt="ارسال رایگان سفارش"
                                                class="img-fluid">
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
                                    <li class="block cat-filter">
                                        <label class="c-ui-statusswitcher">
                                            <input type="checkbox" value="1" id="stock_status-param-1">
                                            <span class="c-ui-statusswitcher__slider">
                                                <span class="c-ui-statusswitcher__slider__toggle"></span>
                                            </span>
                                        </label>
                                        <span class="status"> فقط کالاهای موجود</span>
                                    </li>
                                    <li class="block cat-filter scroll">
                                        <input type="checkbox" name="item" id="off_filter_part">
                                        <i></i>
                                        <label class="filter-cation" for="off_filter_part">برندها</label>

                                        <div class="options">
                                            <ul class="li-item">
                                                <li>
                                                    <label class="checkbox-icon customradio">
                                                        <span class="logo-brand">
                                                            نام فارسی برند
                                                        </span>
                                                        <span class="name-factur">AKG</span>
                                                        <input id="off-1" name="" value="" type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="checkbox-icon customradio">
                                                        <span class="logo-brand">
                                                            نام فارسی برند
                                                        </span>
                                                        <span class="name-factur"> ALTO</span>
                                                        <input id="off-2" name="" value="" type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="checkbox-icon customradio">
                                                        <span class="logo-brand">
                                                            نام فارسی برند
                                                        </span>
                                                        <span class="name-factur"> ASTON</span>
                                                        <input id="off-3" name="" value="" type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="checkbox-icon customradio">
                                                        <span class="logo-brand">
                                                            نام فارسی برند
                                                        </span>
                                                        <span class="name-factur"> KORG</span>
                                                        <input id="off-4" name="" value="" type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="checkbox-icon customradio">
                                                        <span class="logo-brand">
                                                            نام فارسی برند
                                                        </span>
                                                        <span class="name-factur">DPA</span>
                                                        <input id="off-5" name="" value="" type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="checkbox-icon customradio">
                                                        <span class="logo-brand">
                                                            نام فارسی برند
                                                        </span>
                                                        <span class="name-factur">MXL</span>
                                                        <input id="off-6" name="" value=""
                                                            type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="checkbox-icon customradio">
                                                        <span class="logo-brand">
                                                            نام فارسی برند
                                                        </span>
                                                        <span class="name-factur">RODE</span>
                                                        <input id="off-7" name="" value=""
                                                            type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="checkbox-icon customradio">
                                                        <span class="logo-brand">
                                                            نام فارسی برند
                                                        </span>
                                                        <span class="name-factur"> SE ELECTRONICS</span>
                                                        <input id="off-8" name="" value=""
                                                            type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="checkbox-icon customradio">
                                                        <span class="logo-brand">
                                                            نام فارسی برند
                                                        </span>
                                                        <span class="name-factur"> SHURE</span>
                                                        <input id="off-9" name="" value=""
                                                            type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="checkbox-icon customradio">
                                                        <span class="logo-brand">
                                                            نام فارسی برند
                                                        </span>
                                                        <span class="name-factur">TC.HELICON</span>
                                                        <input id="off-10" name="" value=""
                                                            type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="checkbox-icon customradio">
                                                        <span class="logo-brand">
                                                            نام فارسی برند
                                                        </span>
                                                        <span class="name-factur"> M-AUDIO</span>
                                                        <input id="off-11" name="" value=""
                                                            type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="checkbox-icon customradio">
                                                        <span class="logo-brand">
                                                            نام فارسی برند
                                                        </span>
                                                        <span class="name-factur"> BEHRINGER</span>
                                                        <input id="off-12" name="" value=""
                                                            type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="checkbox-icon customradio">
                                                        <span class="logo-brand">
                                                            نام فارسی برند
                                                        </span>
                                                        <span class="name-factur"> ELECTRO VOICE</span>
                                                        <input id="off-13" name="" value=""
                                                            type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>

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
                                                <button class="btn btn btn-primary btn-sm">

                                                    <span>اعمال محدوده قیمت مورد نظر </span>
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
                   @endphp
                   @if ($discount)
                       @if ($discount->type === 'percent')
                           <span class="offer">
                               <span class="off">
                                   {{ round($discount->value, 0) . '%' }}
                               </span>
                           </span>
                       @endif
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
                                                                 @if ($productsuggested->activeDiscount())
                               <span class="old-cost">{{ number_format($productsuggested->price) }}
                                   </span>  <span class="unit">تومان</span>
                               <br>
                               <span class="cost-total">{{ number_format($productsuggested->discountedPrice()) }}
                                   </span>  <span class="unit">تومان</span>
                           @else
                               <span class="cost-total">{{ number_format($productsuggested->price) }}
                                   </span>  <span class="unit">تومان</span>
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
                        <div class="row row-category">

       @foreach ($products as $product)
           <div class="col-6 col-lg-4 col-md-6  col-lg-3 col-xl-3 px-2">
               <div class="item">
                   @php
                       $discount = $product->activeDiscount();
                   @endphp
                   @if ($discount)
                       @if ($discount->type === 'percent')
                           <span class="offer">
                               <span class="off">
                                   {{ round($discount->value, 0) . '%' }}
                               </span>
                           </span>
                       @endif
                   @endif
                   <div class="item-img">
                       <div class="row">
                           <div class="col-12 p-0">
                               <a href="{{ route('Product', $product->id) }}" class="img-pro" target="_blank">
                                   <div class="dark-overlay removeFocusIndicator"></div>
                                   <img src="{{ asset('AdminAssets.Product-image/' . $product->image) }}"
                                       alt="" />
                               </a>
                           </div>
                       </div>
                   </div>
                   <div class="row mt-2">
                       <div class="col-12 text-center pro-name p-0">
                           <a href="{{ route('Product', $product->id) }}">{{ $product->name }}</a>
                       </div>
                   </div>
                   <div class="row mt-2">
                       <div class="col-md-4 d-none d-md-block cost text-left">
                       </div>
                       <div class="col-md-8 col-12 cost text-end pl-0">
                           @if ($product->activeDiscount())
                               <span class="old-cost">{{ number_format($product->price) }}
                                   </span> <span class="unit">تومان</span>
                               <br>
                               <span class="cost-total">{{ number_format($product->discountedPrice()) }}
                                   </span> <span class="unit">تومان</span>
                           @else
                               <span class="cost-total">{{ number_format($product->price) }}
                                   </span> <span class="unit">تومان</span>
                           @endif
                       </div>
                   </div>
               </div>
           </div>
       @endforeach

   </div>


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
                            <h2 dir="rtl" style="text-align: justify;">خرید پیچ گوشتی برقی</h2>
                            <p style="text-align: justify;">
                                <strong>پیچ گوشتی برقی</strong> ابزاری فوق العاده و کارا در انجام باز و بسته نمودن انواع پیچ
                                می‌باشد. <strong>پیچ بند برقی</strong> که عملکردی مشابه پیچ گوشتی معمولی دارد، تفاوت های
                                بنیادی در این کار ایجاد نموده است. سرعت بالای انجام کار و عدم نیاز به اعمال انرژی بسیار از
                                طرف شما برای باز و بسته نمودن پیچ، مواردیست که کمک شایانی به کاربر می نماید. پیچ گوشتی برقی
                                با قابلیت چرخش به دو سمت چپ و راست توانایی منحصر به فردی در ارائه خدمات به استادکاران را
                                دارا می‌باشد.
                            </p>
                            <div dir="rtl" style="text-align: justify;">وجود موتورهای متفاوت در هر پیچ بند موجب ایجاد
                                توان متغیر در این ابزارگردید که این آیتم یکی از موارد مهم در انتخاب بهترین پیچ گوشتی می
                                باشد. میزان گشتاور تولیدی توسط دستگاه و سرعت ایجاد شده در آن از موارد مورد نظر کاربران اهل
                                فن می‌باشد. استفاده از دستگاهی با وزن مناسب و امکان جابجایی وحمل و نقل آسان در کنار راحتی در
                                کنترل و استفاده زیاد از این ابزار برای کاربران مهم است. انواع کلید های با کیفیت برای ایجاد
                                طول عمر بالا و طراحی های متفاوت در ابزارگیر برای هر کدام از انواع پیچ گوشتی برقی و استفاده
                                از گیربکس های خاص برای بالا بردن توان تبدیلی در انواع پیچ بند مواردی هستند که برای
                                <strong>خرید پیچ گوشتی برقی</strong> باید مورد توجه قرار بگیرد.
                            </div>
                            <div dir="rtl" style="text-align: justify;">
                                <h2>خرید پیچ گوشتی شارژی</h2>
                                <p style="text-align: justify;">اگر شما هم جز آن دسته از افراد باشید که دوست دارید وقتی یک
                                    وسیله یا ابزار مصرفی را خریداری میکنید، با یک وسیله پرقدرت و جمع و جور مواجه شوید. یعنی
                                    وقتی <strong>پیچ گوشتی شارژی</strong> می‌خرید، فقط یک پیچ گوشتی شارژی داشته باشید و وقتی
                                    دریل شارژی تهیه می کنید، یک دریل شارژی داشته باشید ما به شما <strong>خرید پیچ گوشتی
                                        شارژی</strong> را پیشنهاد میکنیم. در پیچ گوشتی شارژی&nbsp;سه نظام تبدیل به درایو
                                    کارگیر سرپیچ گوشتی شده و سربیت یا سرپیچ گوشتی از این طریق به پیچ گوشتی شارژی متصل می
                                    شود. <strong>پیچ بند شارژی</strong> دارای ترکمتر است و می توان حداکثر گشتاور مورد نیاز
                                    را در آن تنظیم نمود و البته مکانیزم ضربه زننده نیز یکی دیگر از عوامل کمک کننده در بستن
                                    یا باز کردن پیچ می باشد. تغییر جهت گردش یا چپ گرد راست گرد نیز از دیگر امکانات مورد نیاز
                                    یک پیچ گوشتی شارژی است که برای باز کردن یا بستن پیچ الزامی است. یکی دیگر از مشخصات مهم
                                    در انتخاب و خرید بهترین پیچ گوشتی شارژی توجه به نوع موتور براشلس یا ذغالی است که موتور
                                    براشلس جدیدترین و پرقدرت ترین نوع موتور برای پیچ گوشتی های شارژی می باشند و محاسن زیادی
                                    نسبت به موتورهای ذغالی برخوردارند. </p>
                                <br>
                                <h2>خرید آنلاین پیچ گوشتی برقی و پیچ گوشتی شارژی</h2>
                                <p>اگر قصد <strong>خرید پیچ گوشتی شارژی و پیچ گوشتی برقی</strong> با قیمت مناسب و کیفیت عالی
                                    را دارید ما به شما ابزار مارکت را پیشنهاد می‌دهیم که از ابتدا تا انتهای خرید همراهتان
                                    خواهد بود و مجموعه ای گسترده از این محصولات از برندهای معتبر موجود در بازار را در این
                                    قسمت قرار داده است تا شما همراهان گرامی متناسب با حرفه و فعالیت خود انتخاب و خریدی
                                    آگاهانه داشته باشید و از امتیازات ویژه این مجموعه مانند ارسال رایگان برخوردار شوید .
                                    شرکت ابزار مارکت نیز یکی از فروشندگان پیچ گوشتی برقی و پیچ گوشتی شارژی می باشد که با
                                    مراجعه به سایت ابزار مارکت به راحتی می توانید ابزار مورد نیاز خود را با بهترین قیمت و
                                    ارسال فوری با کمک کارشناسان ابزار مارکت خریداری نمایید. </p>

                            </div>
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
            $(document).on('click', '.apply-price-filter', function() {
                let minPrice = minInput.value;
                let maxPrice = maxInput.value;

                $.ajax({
                    url: "{{ route('products.filterprice') }}",
                    type: "GET",
                    data: {
                        min_price: minPrice,
                        max_price: maxPrice
                    },
                    success: function(data) {
                        $('#product-list').html(data); // جایگزین کردن لیست محصولات
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
