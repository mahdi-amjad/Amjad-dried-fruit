<section class="container-fluid send-section">
    <div class="container p-0">
        <div class="row">
            <div class="col-lg-11 mx-auto col-12 p-0">
                <div class="owl-carousel owl-theme owl-send">
                    <div class="item">
                        <span class="thumbnail thum-send">
                            <i class="img-send"><img src="{{ asset('Assets/images/icon1.png') }}"></i>
                            <div class="desc-send">
                                <div class="title-send">
                                    <div class="d-block"><b>
ارسال سریع و راحت</b></div>
                                    <div class="d-block"> ارسال به سراسر ایران </div>
                                </div>
                            </div>
                        </span>
                    </div>
                    <div class="item">
                        <span class="thumbnail thum-send">
                            <i class="img-send"><img src="{{ asset('Assets/images/icon2.png') }}"></i>
                            <div class="desc-send">
                                <div class="title-send">
                                    <div class="d-block"><b>  خرید اینترنتی ایمن </b></div>
                                    <div class="d-block"> پرداخت آنلاین سفارشات </div>
                                </div>
                            </div>
                        </span>
                    </div>
                    <div class="item">
                        <span class="thumbnail thum-send">
                            <i class="img-send"><img src="{{ asset('Assets/images/icon3.png') }}"></i>
                            <div class="desc-send">
                                <div class="title-send">
                                    <div class="d-block"><b>پشتیبانی محصولات   </b></div>
                                    <div class="d-block">  پاسخگویی از ۸ تا ۲۴ </div>
                                </div>
                            </div>
                        </span>
                    </div>
                    <div class="item">
                        <span class="thumbnail thum-send">
                            <i class="img-send"><img src="{{ asset('Assets/images/icon4.png') }}"></i>
                            <div class="desc-send">
                                <div class="title-send">
                                    <div class="d-block"><b>بازگشت کالا </b></div>
                                </div>
                            </div>
                        </span>
                    </div>
                    <div class="item">
                        <span class="thumbnail thum-send">
                            <i class="img-send"><img src="{{ asset('Assets/images/icon5.png') }}"></i>
                            <div class="desc-send">
                                <div class="title-send">
                                    <div class="d-block"><b> ضمانت اصل بودن کالا </b></div>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="container-fluid  sotial-footer">
    <div class="container p-0">
        <div class="row">
            <div class="col-md-5   ps-md-0 row-social">
                <ul class="p-0">
                    <li>با ما به روز باشید:</li>
                    <li>
                        <a href="{{ $footer->whatsapp }}">
                            <span class="flip"><img src="{{ asset('Assets/images/whatsapp.png') }}"
                                    alt="whatsapp"></span>
                            <span class="flop"><img src="{{ asset('Assets/images/whatsapp.png') }}"
                                    alt="whatsapp"></span>
                        </a>

                    </li>
                    <li>
                        <a href="{{ $footer->instagram }}">
                            <span class="flip"><img src="{{ asset('Assets/images/instagram.png') }}"
                                    alt="instagram"></span>
                            <span class="flop"><img src="{{ asset('Assets/images/instagram.png') }}"></span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ $footer->telegram }}">
                            <span class="flip"><img src="{{ asset('Assets/images/telegram.png') }}"
                                    alt="telegram"></span>
                            <span class="flop"><img src="{{ asset('Assets/images/telegram.png') }}"
                                    alt="telegram"></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-7 col-12 pe-md-0 row-news-letter">
                <div class="row align-items-center">
                    <div class="col-md-6 col-12ps-md-0">
                        <div class="text-news d-block"> از آخرین تخفیف های ما مطلع شوید :</div>
                    </div>
                    <div class="col-md-6 col-12 pe-md-0">
                        <form class="form" action="{{ route('newsletter.subscribe') }}" method="post"
                            >
                            @csrf
                            <input type="text" name="email" placeholder="ایمیل شما" required>
                            <button class="btn btn-news-letter ">ثبت</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="container-fluid footer">
    <div class="container p-0">
        <div class="row">
            <div class="col-lg-3 p-0">
                <p class="title-footer un-link"><span>اطلاعات تماس</span></p>
                <ul class="footer-info p-0">
                    <li class="add-link">
                        <span class="add-icon"></span>
                        <span class="address">
                            آدرس:{{ $footer->address }}
                        </span>

                    </li>
                    <li>
                        <span class="icon-tel"></span>
                        <span>تلفن پشتیبانی:</span>
                        <span class="tel">
                            <span> <a href="tel:{{ $footer->phone }}
                        ">{{ $footer->phone }}
                                </a></span>
                        </span>
                    </li>
                    <li>
                        <span class="icon-mail"></span>
                        <span>پست الکترونیکی:</span>
                        <span class="tel">
                            <span> <a href="{{ $footer->email }}
                        ">{{ $footer->email }}
                                </a></span>
                        </span>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 p-0 accordion-container">
                <div class="row">
                    <div class="col-md-4 col-12 pe-md-2 ps-md-2">
                        <div class="set">
                            <span class="service-icon">
                                <span class="title-footer lnk-footer un-link"><span> معرفی فروشگاه
                                    </span></span>

                                <i class="fa-chevron-down fas fa-chevron-up" aria-hidden="false"></i>
                            </span>
                            <div class="content">
                                <ul class="lnk-footers ps-0">
                                    <li><a href="{{ route('About') }}">درباره ما</a></li>
                                    <li><a href="{{ route('Brandstory') }}">داستان برند ما</a></li>
                                    <li><a href="{{ route('Contact') }}"> تماس با ما</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 pe-md-2 ps-md-2">
                        <div class="set">
                            <span class="service-icon">
                                <span class="title-footer lnk-footer un-link"><span>
                                        خدمات مشتریان</span></span>

                                <i class="fa-chevron-down fas fa-chevron-up" aria-hidden="false"></i>
                            </span>
                            <div class="content">
                                <ul class="lnk-footers ps-0">
                                    <li><a href="{{ route('Frequently') }}">سوالات متداول </a></li>
                                    <li><a href="{{ route('Purchase_delivery') }}"> روش‌های خرید و ارسال</a></li>
                                    <li><a href="{{ route('Terms') }}"> قوانین و مقررات</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 pe-md-2 ps-md-2">
                        <div class="set">
                            <span class="service-icon">
                                <span class="title-footer lnk-footer un-link"><span>
                                        محصولات
                                    </span></span>


                                <i class="fa-chevron-down fas fa-chevron-up" aria-hidden="false"></i>
                            </span>
                            <div class="content">
                                <ul class="lnk-footers ps-0">
                                    @foreach ($categorys as $category)
                                        <li><a
                                                href="{{ route('products.byCategory', $category->id) }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 p-0">
                <ul class="namd p-0">
                    <li>
                        لوگو نماد
                    </li>
                    <li>
                        لوگو ساماندهی
                    </li>

                </ul>
            </div>
        </div>
    </div>
</section>
<section class="container-fluid copy">
    <div class="container p-0">
        <div class="row copy">
            <div class="col-md-12 col-12 p-0 c-right">
                <span>
               {{ $footer->copyright }}
                </span>
            </div>
        </div>
    </div>
</section>
@section('scripts')
    <script>
        // ✅ پیام موفقیت
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        // ✅ پیام خطاها
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
    </script>
@endsection
