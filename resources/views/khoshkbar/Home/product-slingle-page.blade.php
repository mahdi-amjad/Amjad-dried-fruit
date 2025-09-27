@extends('khoshkbar.layout.master')

@section('content')
    <section class="container-fluid inner-section">
        <div class="container gap-col-mob">
            <div class="row product-top ">
                <div class="col-12 col-lg-4 col-md-6 position-relative">
                    <ul class="product-options p-0">
                        <li>
                            <button class="bookmark">
                                <i class="fal fa-bookmark"></i>
                            </button>
                        </li>
                        <li>
                            <button class="share" data-bs-toggle="modal" data-bs-target="#shareModal">
                                <i class="fal fa-share-alt"></i>
                            </button>
                        </li>
                        <li>
                            <button class="analytics" data-bs-toggle="modal" data-bs-target="#analyticsModal">
                                <i class="fal fa-analytics"></i>
                            </button>
                        </li>
                        <li>
                            <button class="balance">
                                <i class="fal fa-balance-scale"></i>
                            </button>
                        </li>
                    </ul>
                    <div class="product-gallery d-block">
                        <div class="d-block gallery-main position-relative">
                            @if ($product->is_special_offer == 1)
                                <div class="product-box-badge product-promotion-badge">
                                    شگفت انگیز
                                </div>
                            @endif
                            <img src="{{ asset('AdminAssets.Product-image/' . $product->image) }}" class="img-fluid"
                                alt="" id="zoom_01"
                                data-zoom-image="{{ asset('AdminAssets.Product-image/' . $product->image) }}" />
                        </div>
                    </div>
                    <div class="gallery-thumbs d-block">
                        <div class="gallery-thumb-items">
                            @foreach ($productimages as $productimage)
                                @if ($productimage->Id_productimage == $product->id)
                                    <div class="product-thumb">
                                        <a class="thumb-wrapper" data-fancybox="mygallery"
                                            href="{{ asset('AdminAssets.Product-image/' . $productimage->image) }}">
                                            <img src="{{ asset('AdminAssets.Product-image/' . $productimage->image) }}"
                                                class="img-fluid" alt="">
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <script>
                    $('[data-fancybox="mygallery"]').on('click', function() {
                        var newImageSrc = $(this).attr('href');
                        $('#main-product-image').attr('src', newImageSrc);
                    });
                </script>
                <div class="col-12 col-lg-8 col-md-6 p-0">
                    <div class="row">

                        <div class="col-12 col-lg-7 col-md-12">
                            <div class="product-title  pr-lg-4">
                                <h1>{{ $product->name }}</h1>
                            </div>
                            <div class="product-sku mt-2 d-block position-relative">
                                <span> کد محصول : {{ $product->product_code }} </span>
                            </div>
                            <div class="d-block opt-pro">
                                <span> دسته بندی : </span>
                                <span class="v-opt">
                                    <a
                                        href="{{ route('products.byCategory', $product->category->id) }}">{{ $product->category->name }}</a>
                                </span>
                            </div>
                            <div class="d-block mt-2 product-brief">
                                <div class="product-brief-title">مشخصات محصول</div>
                                <div class="mt-3">
                                    {!! $product->description !!}
                                </div>


                            </div>

                        </div>
                        <!--نمایش در حالت دسکتاپ-->
                        <div class="col-12 col-md-12 col-lg-5 d-none d-md-block">
                            <div class="d-block timer-clock">
                                <div class="timer" id="significantLayout2"></div>
                                <div class="d-block timer-text">زمان باقیمانده تا پایان تخفیف</div>
                            </div>

                            <div class="d-block">
                                @php
                                    $discount = $product->activeDiscount();
                                    $unitPrice = $discount ? $product->discountedPrice() : $product->price;
                                    $originalPrice = $product->price;
                                @endphp

                                <div class="product-price-area text-center">
                                    @if ($unitPrice > 0)
                                        @if ($discount)
                                            <div class="d-block">
                                                <span><del
                                                        id="product-original-price-{{ $product->id }}">{{ number_format($originalPrice) }}</del></span>
                                                <span class="badge badge-danger">
                                                    ٪
                                                    {{ $discount->type === 'percent'
                                                        ? round($discount->value, 0)
                                                        : round(($discount->value / $product->price) * 100) }}
                                                    <span>تخفیف</span>
                                                </span>
                                            </div>
                                        @endif

                                        <div class="d-block product-price-sale">
                                            <span class="ng-binding" id="product-price-{{ $product->id }}"
                                                data-unit-price="{{ $unitPrice }}"
                                                data-original-price="{{ $originalPrice }}">
                                                {{ number_format($unitPrice) }} تومان
                                            </span>
                                        </div>
                                    @else
                                        <div class="d-block product-price-sale">
                                            <span class="text-danger fw-bold">ناموجود</span>
                                        </div>
                                    @endif
                                </div>

                                <div class="product-card-area">
                                    <form action="{{ route('cart.add', $product->id) }}" method="post"
                                        id="cart-form-{{ $product->id }}">
                                        @csrf
                                        <div class="product-add-to-card">

                                            <!-- انتخاب وزن -->
                                            <div class="col-12 mb-2">
                                                <select class="form-select" name="weight" id="weight-{{ $product->id }}"
                                                    onchange="updatePrice({{ $product->id }})">
                                                    <option value="500" {{ $product->weight == 500 ? 'selected' : '' }}>
                                                        500 گرم</option>
                                                    <option value="1000"
                                                        {{ $product->weight == 1000 ? 'selected' : '' }}>1 کیلوگرم</option>
                                                    <option value="5000"
                                                        {{ $product->weight == 5000 ? 'selected' : '' }}>5 کیلوگرم</option>
                                                </select>
                                            </div>

                                            <!-- تعداد -->
                                            <div class="col-4">
                                                <div class="quantity" data-product-id="{{ $product->id }}">
                                                    <div class="quantity-up">
                                                        <img src="{{ asset('Assets/images/plus.svg') }}" width="12px">
                                                    </div>
                                                    <input type="text" name="quantity" value="1" min="1"
                                                        id="quantity-{{ $product->id }}" class="form-control quantity-val"
                                                        readonly>
                                                    <div class="quantity-down">
                                                        <i class="fas fa-minus"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- افزودن به سبد خرید -->
                                            <div class="col-12 mt-2">
                                                <button type="submit" class="btn btn-primary btn-block btn-basket">افزودن
                                                    به سبد خرید</button>
                                            </div>

                                        </div>
                                    </form>

                                </div>



                                <div class="d-block mt-3 ">
                                    <a href="javascript:void(0)" class="spoiler-link" data-bs-toggle="modal"
                                        data-bs-target="#suggestionModal">
                                        آیا قیمت مناسب‌تری سراغ دارید؟
                                    </a>
                                </div>
                                <div class="d-block mt-3 ">
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
                        </div>
                    </div>
                </div>
                <!--نمایش در گوشی-->
                <div class="row d-xl-none d-lg-none d-md-none product-top">
                    <div class="col-12">
                        <div class="d-block timer-clock">
                            <div class="timer" id="significantLayout3"></div>
                            <div class="d-block timer-text">زمان باقیمانده تا پایان تخفیف</div>
                        </div>
                        <div class="d-block ">
                            <div class="product-price-area text-center">
                                @php
                                    $discount = $product->activeDiscount();
                                    $unitPrice = $discount ? $product->discountedPrice() : $product->price;
                                @endphp

                                @if ($unitPrice > 0)
                                    @if ($discount)
                                        {{-- قیمت اصلی خط خورده --}}
                                        <div class="d-block">
                                            <span>
                                                <del class="ng-binding">{{ number_format($product->price) }}</del>
                                            </span>
                                            <span class="badge badge-danger">
                                                ٪ <font class="ng-binding">
                                                    {{ $discount->type === 'percent'
                                                        ? round($discount->value, 0)
                                                        : round(($discount->value / $product->price) * 100) }}
                                                </font>
                                                <span> تخفیف </span>
                                            </span>
                                        </div>
                                        <div class="d-block product-price-sale">
                                            <span class="ng-binding">
                                                {{ number_format($product->discountedPrice()) }}
                                                <font class="currency">تومان</font>
                                            </span>
                                        </div>
                                    @else
                                        <div class="d-block product-price-sale">
                                            <span class="ng-binding">
                                                {{ number_format($product->price) }}
                                                <font class="currency">تومان</font>
                                            </span>
                                        </div>
                                    @endif
                                @else
                                    <div class="d-block product-price-sale">
                                        <span class="text-danger fw-bold">ناموجود</span>
                                    </div>
                                @endif

                            </div>
                        </div>
                        <div class="product-card-area ">
                            <div class="row row-cost-mob">
                                <div class="col-12 text-center">
                                    <span>مبلغ قابل پرداخت:</span>
                                    <span class="bld-col-cost">865،5000</span>
                                    <span class="unit">تومان</span>
                                </div>
                            </div>
                            <form action="{{ route('cart.add', $product->id) }}" method="post">
                                @csrf <!-- برای جلوگیری از CSRF Attack -->
                                <div class="product-add-to-card">
                                    <div class="row no-gutters">
                                        <div class="d-block timer-clock">
                                            <div class="timer" id="significantLayout2"></div>
                                            <select class="form-select" aria-label="Default select example"
                                                name="weight">
                                                <option selected value="250">250 گرم</option>
                                                <option value="500">500 گرم</option>
                                                <option value="1000">1 کیلوگرم</option>
                                            </select>
                                        </div>

                                        <div class="col-4 p-0 mt-2">
                                            <div class="column count">
                                                <div class="quantity">
                                                    <div class="quantity-up">
                                                        <img src="{{ asset('Assets/images/plus.svg') }}" width="12px">
                                                    </div>
                                                    <input type="text" name="quantity" value="1" min="1"
                                                        class="form-control quantity-val" step="1">
                                                    <div class="quantity-down">
                                                        <i class="fas fa-minus"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col p-1">
                                            @php
                                                $unitPrice = $product->activeDiscount()
                                                    ? $product->discountedPrice()
                                                    : $product->price;
                                            @endphp

                                            @if ($unitPrice > 0)
                                                <button type="submit" class="btn btn-primary btn-block btn-basket">
                                                    <span>افزودن به سبد خرید</span>
                                                    <i class="fad fa-shopping-cart"></i>
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-primary btn-block btn-basket"
                                                    disabled>
                                                    ناموجود
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="d-block mt-3 ">
                            <a href="javascript:void(0)" class="spoiler-link" data-bs-toggle="modal"
                                data-bs-target="#suggestionModal">
                                آیا قیمت مناسب‌تری سراغ دارید؟
                            </a>
                        </div>
                        <div class="d-block mt-3 ">
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
                </div>

                <!--نمایش دسکتاپ-->
                <div class="row mt-4 d-none d-md-block">
                    <div class="col-12 p-0">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#tab1" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">
                                    <i class="fad fa-file-alt"></i> توضیحات کالا </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#tab2"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">
                                    <i class="fad fa-list-ul"></i> مشخصات محصول </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#tab3"
                                    type="button" role="tab" aria-controls="contact" aria-selected="false">
                                    <i class="fad fa-comments-alt"></i> نقد و نظرات </button>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="product-description">
                                    {!! $product->caption !!}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="profile-tab">
                                <table class="table table-borderless table-sm">
                                    <tbody>
                                        @foreach ($specifications as $index => $spec)
                                            <tr>
                                                <th scope="row" class="col-12 col-md-4">
                                                    <span class="specs-label">{{ $spec->name }}
                                                        <span class="number-opt" tabindex="0" data-bs-toggle="popover"
                                                            data-bs-trigger="hover focus" data-bs-content="1"
                                                            data-bs-placement="bottom">
                                                            <i class="far fa-info-circle"></i>
                                                        </span>
                                                    </span>

                                                </th>
                                                <td class="col-12 col-md-8">
                                                    <span class="specs-value">{{ $spec->value }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3"
                                        style="display: none" type="button"></button>
                                </li>
                            </ul>
                            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="contact-tab">


                                @auth


                                    <div class="row mt-4">
                                        <div class="col-md-5 col-12 ps-md-0 sticky_column">
                                            <form id="review-form" class="frm-comment"
                                                action="{{ route('reviews.store', $product->id) }}" method="POST">
                                                @csrf
                                                <p>نظر خود در درباره این محصول را ثبت نمایید</p>
                                                <div class="row">
                                                    <div class="col-12 p-0">
                                                        <ul class="rate-list">
                                                            <li>
                                                                <span>امتیاز</span>
                                                                <span class="star-rating__wrap">
                                                                    @for ($i = 5; $i >= 1; $i--)
                                                                        <input class="star-rating__input"
                                                                            id="star-rating-{{ $i }}"
                                                                            type="radio" name="rating"
                                                                            value="{{ $i }}"
                                                                            {{ old('rating') == $i ? 'checked' : '' }}>
                                                                        <label class="star-rating__ico fal fa-star"
                                                                            for="star-rating-{{ $i }}"></label>
                                                                    @endfor
                                                                    @error('rating')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <input type="text" name="first_name" placeholder="نام شما"
                                                            class="form-control" value="{{ old('first_name') }}">
                                                        @error('first_name')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-12">
                                                        <input type="text" name="last_name" placeholder="نام خانوادگی "
                                                            class="form-control" value="{{ old('last_name') }}">
                                                        @error('last_name')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-12">
                                                        <textarea name="message" id="content" class="form-control  message-box-review" cols="5" rows="5"
                                                            placeholder="متن پیام">{{ old('message') }}</textarea>
                                                        @error('message')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-12 comment-hint-btn">
                                                        <button type="submit" class="btn btn-primary">
                                                            <span>ارسال پیام </span>
                                                            <i class="fad fa-comment-alt-plus"></i>
                                                        </button>

                                                    </div>
                                                </div>
                                            </form>
                                        </div>


                                        <div class="col-md-7 col-12 pe-md-0">
                                            <ul class="list-comment">
                                                @if ($product->reviews->isEmpty())
                                                    <div class="c-message-light">
                                                        پرسش و پاسخی جهت نمایش موجود نیست
                                                    </div>
                                                @else
                                                    @foreach ($reviews as $review)
                                                        <li>
                                                            <div class="row">
                                                                <div class="col-12 p-0 top-review">
                                                                    <ul>
                                                                        <li>{{ $review->created_at_jalali }}</li>
                                                        </li>
                                                        <li>{{ $review->first_name }} {{ $review->last_name }}
                                                        </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row body-revirew">
                                        <div class="col-12 p-0">
                                            {{ $review->message }}
                                        </div>
                                        <div class="col-12 text-right">
                                            <div class="rating" style="text-align: left;">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $review->rating)
                                                        <i class="fas fa-star"></i>
                                                    @else
                                                        <i class="far fa-star"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                    </li>
                                    @endforeach

                                    </ul>
                                </div>
                            </div>
                            @endif
                        @else
                            <div class="comment-hint-title d-block"> شما هم می‌توانید در مورد این کالا نظر بدهید. </div>
                            <div class="comment-hint-text"> برای ثبت نظر، لازم است ابتدا وارد حساب کاربری خود شوید. اگر این
                                محصول را قبلا از راشا ابزار خریده باشید، نظر شما به عنوان مالک محصول ثبت خواهد شد. </div>
                            <div class="comment-hint-btn">
                                <button type="button" class="btn btn-primary" onclick="openForm()"
                                    href="javascript:void();">
                                    <span>افزودن نظر جدید</span>
                                    <i class="fad fa-comment-alt-plus"></i>
                                </button>
                            </div>
                        @endauth
                    </div>

                </div>
            </div>
        </div>
        <!--نمایش گوشی-->
        <div class="row d-xl-none d-lg-none d-md-none product-top desc-pro">
            <div class="col-12">
                <div class="product-description">
                    <div class="h2 ">توضیحات کالا</div>
                    <h1>معرفی و مشخصات پیچ گوشتی برقی محک 450 وات مدل SDM-450</h1>
                    <div>
                        <p>دستگاه آرماتور بند اتوماتیک شارژی از نظر فنی و تخصصی از کیفیت بسیار مناسبی برخوردار است و با
                            وجود وزن و ابعاد بسیار مناسب و نیز شارژی بودن استفاده آن را بسیار مطلوب کرده است. بدلیل سرعت
                            بالا در ایجاد گره که حدود هزار گره در هر شارژ است راندمان کار را بسیار بالا برده و با توجه
                            به ایجاد گره های بهینه و قابل تنظیم و مصرف سیم متعارف این دستگاه را بسیار مقرون به صرفه کرده
                            است.</p>
                        <h2>
                            <span>
                                <strong>
                                    <span>مشخصات گره زن اتوماتیک یا آرماتور بند اتوماتیک شارژی&nbsp;</span>
                                </strong>
                            </span>
                        </h2>
                        <p>فک قابل تنظیم برای سایزهای مختلف آرماتور</p>
                        <p>در حدود 60 دقیقه شارژ می شود</p>
                        <p>ایجاد 1000 گره در هر بار شارژ دستگاه</p>
                        <p>سرعت بسیار بالا برای یک گره کمتر از یک ثانیه</p>
                        <p>وزن دستگاه با باتری و رول 1.5 کیلو گرم</p>
                        <p>اندازه گره حداکثر 35 میلی متر</p>
                        <p>حداکثر مصرف طول سیم برای یک گره 420 میلی متر بسته به اندازه میلگرد و اندازه گره</p>
                    </div>
                    <div class="product-description mt-3"> مشاهده انواع <a href="#" class="spoiler-linkX"
                            targe="_blank">آرماتور بند اتوماتیک</a> و دیگر ابزار های <a href="#"
                            class="spoiler-linkX" targe="_blank">سایر برندها - Other</a> مشاهده تمام محصولات دسته <a
                            href="#" class="spoiler-linkX" targe="_blank">آرماتور بند اتوماتیک</a>
                    </div> مشاهده تمام محصولات برند <a href="#" class="spoiler-linkX" targe="_blank">سایر
                        برندها - Other</a>
                </div>
                <div class="d-block text-end">
                    <div class="more-desc-info">مشاهده توضیحات کامل</div>
                </div>
            </div>
        </div>
        <div class="row d-xl-none d-lg-none d-md-none product-top desc-attrib">
            <div class="col-12 tbl-atrib">
                <table class="table table-borderless table-sm">
                    <tbody>
                        <tr>
                            <th scope="row" class="col-12 col-md-4">
                                <span class="specs-label"> نوع پیچ گوشتی برقی
                                    <span class="number-opt" tabindex="0" data-bs-toggle="popover"
                                        data-bs-trigger="hover focus" data-bs-content="1" data-bs-placement="bottom"
                                        data-bs-original-title="" title="">
                                        <i class="far fa-info-circle"></i>
                                    </span>
                                </span>

                            </th>
                            <td class="col-12 col-md-8">
                                <span class="specs-value">ساده</span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="col-12 col-md-4">
                                <span class="specs-label"> توان
                                    <span class="number-opt" tabindex="0" data-bs-toggle="popover"
                                        data-bs-trigger="hover focus" data-bs-content="2" data-bs-placement="bottom"
                                        data-bs-original-title="" title="">
                                        <i class="far fa-info-circle"></i>
                                    </span>
                                </span>

                            </th>
                            <td class="col-12 col-md-8">
                                <span class="specs-value">450 وات</span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="col-12 col-md-4">
                                <span class="specs-label"> سایز درایو / سه نظام
                                    <span class="number-opt" tabindex="0" data-bs-toggle="popover"
                                        data-bs-trigger="hover focus" data-bs-content="3" data-bs-placement="bottom"
                                        data-bs-original-title="" title="">
                                        <i class="far fa-info-circle"></i>
                                    </span>
                                </span>

                            </th>
                            <td class="col-12 col-md-8">
                                <span class="specs-value">10 میلی‌متر</span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="col-12 col-md-4">
                                <span class="specs-label"> قابلیت تنظیم سرعت
                                    <span class="number-opt" tabindex="0" data-bs-toggle="popover"
                                        data-bs-trigger="hover focus" data-bs-content="4" data-bs-placement="bottom"
                                        data-bs-original-title="" title="">
                                        <i class="far fa-info-circle"></i>
                                    </span>
                                </span>

                            </th>
                            <td class="col-12 col-md-8">
                                <span class="specs-value">دارد</span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="col-12 col-md-4">
                                <span class="specs-label"> دور در حالت آزاد
                                    <span class="number-opt" tabindex="0" data-bs-toggle="popover"
                                        data-bs-trigger="hover focus" data-bs-content="5" data-bs-placement="bottom"
                                        data-bs-original-title="" title="">
                                        <i class="far fa-info-circle"></i>
                                    </span>
                                </span>

                            </th>
                            <td class="col-12 col-md-8">
                                <span class="specs-value">1000 - 0 دور بر دقیقه</span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="col-12 col-md-4">
                                <span class="specs-label"> وزن
                                    <span class="number-opt" tabindex="0" data-bs-toggle="popover"
                                        data-bs-trigger="hover focus" data-bs-content="6" data-bs-placement="bottom"
                                        data-bs-original-title="" title="">
                                        <i class="far fa-info-circle"></i>
                                    </span>
                                </span>

                            </th>
                            <td class="col-12 col-md-8">
                                <span class="specs-value">1.5 کیلوگرم</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="d-block text-end">
                <div class="more-desc-info">مشاهده توضیحات کامل</div>
            </div>
        </div>
        <div class="row d-xl-none d-lg-none d-md-none product-top desc-attrib">
            <div class="col-12 p-0">
                <div class="row align-items-center">
                    <div class="col-8 pe-0">
                        نظرات کاربران به این محصول |
                        <font class="ng-binding">0</font> نظر
                    </div>
                    <div class="col-4 ps-0 text-end">
                        <button type="button" class="btn btn-primary" onclick="openForm()" href="javascript:void();">
                            <span>افزودن نظر</span>
                        </button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="co-12">
                        <div class="c-message-light">
                            پرسش و پاسخی جهت نمایش موجود نیست
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-5 col-12 ps-md-0">
                        <form class="frm-comment" action="#" method="">

                            <p>نظر خود در درباره این محصول را ثبت نمایید</p>
                            <div class="row">
                                <div class="col-12 p-0">
                                    <ul class="rate-list">
                                        <li>
                                            <span>امتیاز</span>
                                            <span class="star-rating__wrap">
                                                <input class="star-rating__input" id="star-rating-5" type="radio"
                                                    name="rating" value="5">
                                                <label class="star-rating__ico fal fa-star" for="star-rating-5"></label>
                                                <input class="star-rating__input" id="star-rating-4" type="radio"
                                                    name="rating" value="4">
                                                <label class="star-rating__ico fal fa-star" for="star-rating-4"></label>
                                                <input class="star-rating__input" id="star-rating-3" type="radio"
                                                    name="rating" value="3">
                                                <label class="star-rating__ico  fal fa-star" for="star-rating-3"></label>
                                                <input class="star-rating__input" id="star-rating-2" type="radio"
                                                    name="rating" value="2">
                                                <label class="star-rating__ico  fal fa-star" for="star-rating-2"></label>
                                                <input class="star-rating__input" id="star-rating-1" type="radio"
                                                    name="rating" value="1">
                                                <label class="star-rating__ico  fal fa-star" for="star-rating-1"></label>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" placeholder="نام شما" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <input type="email" placeholder="ایمیل " class="form-control">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <textarea name="content" id="content" class="form-control  message-box-review" cols="5" rows="5"
                                        placeholder="متن پیام"></textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 comment-hint-btn">
                                    <button type="submit" class="btn btn-primary">
                                        <span>ارسال پیام </span>
                                        <i class="fad fa-comment-alt-plus"></i>
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-7 col-12 pe-md-0">
                        <ul class="list-comment">
                            <li>
                                <div class="row">
                                    <div class="col-12 p-0 top-review">
                                        <ul>
                                            <li>چهارشنبه 15 دی 1400 - 14:59:56</li>
                                            <li>حسین تقی زاده</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row body-revirew">
                                    <div class="col-12 p-0"> با درود ممنون از بسته بندی خوبتون </div>
                                    <div class="col-12 text-right">
                                        <div class="rating" style=" text-align: left;">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="fa fa-stack">
                                                <i class="far fa-star"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-12 p-0 top-review">
                                        <ul>
                                            <li>سه شنبه 14 دی 1400 - 14:57:32</li>
                                            <li>محتشمی</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row body-revirew">
                                    <div class="col-12 p-0"> سلام و عرض ادب بسیار ممنون و سپاگذارم واقعا راضی و خرسندم
                                        از خریدم </div>
                                    <div class="col-12 text-right">
                                        <div class="rating" style=" text-align: left;">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-12 p-0 top-review">
                                        <ul>
                                            <li>دوشنبه 13 دی 1400 - 14:59:56</li>
                                            <li>میرمحمدی</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row body-revirew">
                                    <div class="col-12 p-0"> عرض سلام ، من خریدم و از کیفیتش راضی بودم </div>
                                    <div class="col-12 text-right">
                                        <div class="rating" style=" text-align: left;">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li style="display: none;" class="toggleable">
                                <div class="row">
                                    <div class="col-12 p-0 top-review">
                                        <ul>
                                            <li>دوشنبه 13 دی 1400 - 14:57:32</li>
                                            <li>سهیل تیموری</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row body-revirew">
                                    <div class="col-12 p-0"> با سلام و احترام قیمتش تو سایتتون نسبت به مغازه بهتره
                                    </div>
                                    <div class="col-12 text-right">
                                        <div class="rating" style=" text-align: left;">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li style="display: none;" class="toggleable">
                                <div class="row">
                                    <div class="col-12 p-0 top-review">
                                        <ul>
                                            <li>یکشنبه 12 دی 1400 - 15:07:10</li>
                                            <li>اکبری</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row body-revirew">
                                    <div class="col-12 p-0"> از خریدم راضی بودم اما از زمان ارسالش نه چون دیر بدستم
                                        رسید </div>
                                    <div class="col-12 text-right">
                                        <div class="rating" style=" text-align: left;">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="fa fa-stack">
                                                <i class="far fa-star"></i>
                                            </span>
                                            <span class="fa fa-stack">
                                                <i class="far fa-star"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <div class="row d-xl-none d-lg-none d-md-none product-top desc-attrib">
            <div class="col-12 p-0">
                <div class="row align-items-center">
                    <div class="col-8 pe-0">
                        پرسش ها و پاسخ ها |
                        <font class="ng-binding">0</font>
                    </div>
                    <div class="col-4 ps-0 text-end">
                        <button type="button" class="btn btn-primary" onclick="openForm()" href="javascript:void();">
                            <span>ارسال پرسش</span>
                        </button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="co-12">
                        <div class="c-message-light">
                            پرسش و پاسخی جهت نمایش موجود نیست
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!--پایان-->


        </div>
    </section>
    <section class="container-fluid categori-section">
        <div class="row   mt-4 mb-5">
            <div class="col-12 p-0">
                <div class="row">
                    <div class="col-12 p-0 text-center">
                        <h2 class="caption-section">
                            <span>محصولات
                                <i class="color">مشابه</i>
                            </span>
                        </h2>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12 p-0">
                        <div class="owl-carousel owl-theme owl-pro">
                            @foreach ($relatedproduct as $product)
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
                                                <a href="{{ route('Product', $product->id) }}" class="img-pro"
                                                    target="_blank">
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
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- مودال اشتراک گذاری -->
    <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="shareModalLabel">اشتراک گذاری</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="share__title">با استفاده از روش‌های زیر می‌توانید این صفحه را با دوستان خود به
                                اشتراک بگذارید.</div>
                        </div>
                        <div class="col-12">
                            <div class="share__options">
                                <div class="share__social-buttons">
                                    <a href="#" rel="nofollow" class="o-btn share__social share__social--twitter"
                                        target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="%3d.html" rel="nofollow" class="o-btn share__social share__social--fb"
                                        target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" rel="nofollow" class="o-btn share__social share__social--whatsapp"
                                        target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                    <a href="#" rel="nofollow" class="o-btn share__social share__social--telegram"
                                        target="_blank">
                                        <i class="fab fa-telegram"></i>
                                    </a>
                                </div>
                                <div class="share__btn">کپی لینک</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--مودال suggestion-->
    <div class="modal fade" id="suggestionModal" tabindex="-1" aria-labelledby="suggestionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="suggestionModalLabel">گزارش قیمت مناسب‌تر این کالا </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="suggest-cost" action="#" method="">
                        <p>این کالا را با چه قیمتی دیده‌اید؟</p>
                        <div class="d-block mt-1 mb-1">
                            <input type="text" class="price_suggestion_data_price form-control"
                                placeholder="65,000 مثلا">
                        </div>
                        <div id="price_suggestion_data_price-error" class="invalid__label d-block">تکمیل این فیلد اجباریست
                        </div>
                        <div class="block cat-filter d-block position-relative">
                            <label class="c-ui-statusswitcher">
                                <input type="checkbox" value="1" id="stock_status-param-1">
                                <span class="c-ui-statusswitcher__slider">
                                    <span class="c-ui-statusswitcher__slider__toggle"></span>
                                </span>
                            </label>
                            <span class="status"> فقط کالاهای موجود</span>
                        </div>
                        <p>نام فروشگاه اینترنتی</p>
                        <div class="d-block mt-1 mb-1">
                            <input type="text" class="price_suggestion_data_store_name form-control"
                                placeholder="نام فروشگاه را وارد کنید">
                        </div>
                        <p>آدرس فروشگاه اینترنتی</p>
                        <div class="d-block mt-1 mb-1">
                            <input type="text" class="price_suggestion_data_address form-control"
                                placeholder="www.example.com">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-12 text-left badge-area">
                            <button class="btn btn-success" type="submit"> ثبت اطلاعات </button>
                            <button class="btn btn-secondary" type="button" data-dismiss="modal"> انصراف </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('Assets/js/main-min.js') }}"></script>
    <script src="{{ asset('Assets/js/gallery.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("[data-fancybox]").each(function() {
                $(this).attr("data-caption", $(this).attr("title"));
            });
            $("[data-fancybox]").fancybox();
        });

        $('.list-comment').each(function() {
            var LiN = $(this).find('li').length;
            if (LiN > 6) {
                $('li', this).eq(6).nextAll().hide().addClass('toggleable');
                $(this).append('<li class="more">نمایش بیشتر</li>');

            }
        });
        $('.list-comment').on('click', '.more', function() {
            if ($(this).hasClass('less')) {
                $(this).text('نمایش بیشتر').removeClass('less');
            } else {
                $(this).text('نمایش کمتر').addClass('less');
            }
            $(this).siblings('li.toggleable').slideToggle();
        });
    </script>
    <script>
        $('.desc-pro .more-desc-info').on('click', function() {
            $('.product-description').addClass('show-content');
            $(this).addClass('hide');
        });
        $('.desc-attrib .more-desc-info').on('click', function() {
            $('.tbl-atrib').addClass('show-content');
            $(this).addClass('hide');
        });
    </script>
    <script>
        $(function() {
            var header = $('.product-card-area ');

            $(window).scroll(function() {
                var scroll = $(window).scrollTop();

                if (scroll >= $('.product-carousel').offset().top) { // check the offset top
                    header.addClass('highlight');
                    $('body').addClass('p-bottom');
                    $('.row-cost-mob').addClass('show-bottom');
                } else if (scroll < $('.product-carousel').offset().top + $('.product-carousel')
                    .height()) { // check the scrollHeight
                    header.removeClass('highlight');
                    $('body').removeClass('p-bottom');
                    $('.row-cost-mob').removeClass('show-bottom');
                }
            });
        });
    </script>
    <script>
        $('#significantLayout2').countdown({
            isRTL: true,
            labels: ['ثانیه', 'دقیقه', 'ساعت'],
            compactLabels: ['y', 'm', 'w', 'd', 'h', 'm', 's'],
            until: '+2h +1m +15s',
            layout: '{hn} ساعت, {mn} دقیقه, {sn}ثانیه'
        });
        $('#significantLayout3').countdown({
            isRTL: true,
            labels: ['ثانیه', 'دقیقه', 'ساعت'],
            compactLabels: ['y', 'm', 'w', 'd', 'h', 'm', 's'],
            until: '+2h +1m +15s',
            layout: '{hn} ساعت, {mn} دقیقه, {sn}ثانیه'
        });
    </script>
    <script>
        // فیکس شدن فیلتر  
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
        //zoom    		
        var viewportWidth = $(window).width();
        if (viewportWidth > 767) {
            $("#zoom_01").elevateZoom({
                scrollZoom: true,
                zoomWindowPosition: 10
            });
        }
    </script>
    <script>
        // اضافه کردن عملکرد افزایش و کاهش مقدار
        document.querySelectorAll('.quantity').forEach(function(quantityElement) {
            const quantityInput = quantityElement.querySelector('.quantity-val');
            const quantityUp = quantityElement.querySelector('.quantity-up');
            const quantityDown = quantityElement.querySelector('.quantity-down');

            // دکمه افزایش
            quantityUp.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value);
                currentValue = currentValue + 1; // افزایش مقدار
                quantityInput.value = currentValue;
            });

            // دکمه کاهش
            quantityDown.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value);
                if (currentValue > 1) { // جلوگیری از کاهش مقدار به کمتر از 1
                    currentValue = currentValue - 1;
                    quantityInput.value = currentValue;
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                toastr.success("{{ session('success') }}");
            @endif
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const hash = window.location.hash;
            if (hash === "#tab3") {
                const tabEl = document.querySelector('#tab3-tab');
                if (tabEl) {
                    const tab = new bootstrap.Tab(tabEl);
                    tab.show();
                }

                // اسکرول به تب
                const tabContent = document.querySelector(hash);
                if (tabContent) {
                    tabContent.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            }
        });
    </script>
    <script>
    document.querySelectorAll('.quantity').forEach(qtyDiv => {
    let productId = parseInt(qtyDiv.dataset.productId);

    let input = qtyDiv.querySelector('input');
    let btnUp = qtyDiv.querySelector('.quantity-up');
    let btnDown = qtyDiv.querySelector('.quantity-down');

    // ابتدا listenerهای قدیمی را حذف می‌کنیم تا دوبار trigger نشه
    btnUp.replaceWith(btnUp.cloneNode(true));
    btnDown.replaceWith(btnDown.cloneNode(true));

    btnUp = qtyDiv.querySelector('.quantity-up');
    btnDown = qtyDiv.querySelector('.quantity-down');

    btnUp.addEventListener('click', () => {
        changeQuantity(productId, 1, input);
    });

    btnDown.addEventListener('click', () => {
        changeQuantity(productId, -1, input);
    });
});

function changeQuantity(productId, change, input) {
    let current = parseInt(input.value) || 1;
    let newValue = current + change;
    if (newValue < 1) newValue = 1; // حداقل 1
    input.value = newValue;

    updatePrice(productId);
}



        function updatePrice(productId) {
            let weightSelect = document.getElementById('weight-' + productId);
            let weight = parseInt(weightSelect.value) || 500;

            let quantityInput = document.getElementById('quantity-' + productId);
            let quantity = parseInt(quantityInput.value) || 1;

            let priceElement = document.getElementById('product-price-' + productId);
            let unitPrice = parseFloat(priceElement.dataset.unitPrice) || 0;
            let originalPrice = parseFloat(priceElement.dataset.originalPrice) || 0;

            // محاسبه قیمت نهایی بر اساس وزن و تعداد
            let totalPrice = unitPrice * (weight / 500) * quantity;
            let totalOriginal = originalPrice * (weight / 500) * quantity;

            // بروزرسانی نمایش قیمت‌ها
            priceElement.innerText = totalPrice.toLocaleString('en-US') + " تومان";
            let originalPriceElement = document.getElementById('product-original-price-' + productId);
            if (originalPriceElement) {
                originalPriceElement.innerText = totalOriginal.toLocaleString('en-US');
            }
        }



        // هنگام submit فرم، تعداد و وزن را همگام‌سازی می‌کنیم
        document.querySelectorAll('form[id^="cart-form-"]').forEach(form => {
            form.addEventListener('submit', function(e) {
                let productId = form.id.split('-').pop();
                // مقدار فعلی input ها را روی فرم قرار بده
                form.querySelector('input[name="quantity"]').value = document.getElementById('quantity-' +
                    productId).value;
                form.querySelector('select[name="weight"]').value = document.getElementById('weight-' +
                    productId).value;
            });
        });
    </script>

@endsection
