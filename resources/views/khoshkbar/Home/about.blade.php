@extends('khoshkbar.layout.master')

@section('content')
<section class="container-fluid inner-section mt-4 mb-4">
    <div class="container p-0">
        <div class="row mt-3 mb-3">
            <div class="col-12 p-0">
                <div class="card crd-info">
                    <div class="card-body">
                        <!-- عنوان و توضیح کوتاه -->
                        <div class="row">
                            <div class="col-12 p-0">
                                <div class="tiltle-slider">
                                    درباره ما
                                    <p class="c-desc-category">
                                        از دل کوهستان‌های آذربایجان شرقی تا سفره‌های ایرانی
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- متن اصلی و تصویر -->
                        <div class="row mt-4">
                            <div class="col-md-7 col-12 p-0 text">
                                <p>
                                    به <strong>خشکبار امجد</strong> خوش آمدید؛ جایی که طعم اصیل خشکبار ایرانی با کیفیتی بی‌نظیر در هم آمیخته است.
                                    ما بیش از <strong>۱۰ سال است</strong> که با عشق و تجربه، در زمینه تولید و عرضه خشکبار فعالیت می‌کنیم.
                                </p>
                                <p>
                                    محصولات ما از دل <strong>مناطق سرسیر و کوهستانی آذربایجان شرقی</strong> به دست می‌آیند؛ جایی که طبیعت سخاوتمندانه بهترین گردوها،
                                    کشمش‌ها و زردآلوها را به ما هدیه داده است. همین شرایط خاص آب‌وهوایی باعث شده خشکبار ما طعمی متفاوت و ماندگار داشته باشد.
                                </p>
                                <!-- توضیح کاربرپسند اضافه شده -->
                                <p class="mt-4 text-gray-700">
                                    ما در خشکبار امجد به شما تجربه‌ای لذت‌بخش از خرید آنلاین ارائه می‌دهیم؛ جایی که هر محصول با دقت انتخاب، با عشق بسته‌بندی و با اطمینان به دست شما می‌رسد. کافی است یک‌بار طعم واقعی خشکبار ایرانی را امتحان کنید تا تفاوت کیفیت و اصالت را حس کنید و به جمع مشتریان وفادار ما بپیوندید.
                                </p>
                            </div>
                            <div class="col-md-5 col-12 p-10">
                                <img src="{{ asset('AdminAssets.About/about.jpg') }}" alt="" style="border-radius: 10px;" class="img-fluid">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3 mb-3">
            <div class="col-12 p-0">
                <div class="card crd-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 p-0">
                                <span class="tiltle-slider">ارزش‌هایمان کدام است؟</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-12 mt-3">
                                <div class="d-block c-desc-category">
                                    <i class="fal fa-badge-check"></i>
                                    مشتری‌محوری
                                </div>
                                <div class="text">
                                    ما معتقدیم رضایت شما سرمایه اصلی ماست و هر تصمیمی با توجه به نیاز شما گرفته می‌شود.
                                </div>
                            </div>
                            <div class="col-md-4 col-12 mt-3">
                                <div class="d-block c-desc-category">
                                    <i class="fal fa-badge-check"></i>
                                    شفافیت
                                </div>
                                <div class="text">
                                    تمام اطلاعات محصولات، قیمت و شرایط ارسال به‌صورت شفاف و بدون پنهان‌کاری ارائه می‌شود.
                                </div>
                            </div>
                            <div class="col-md-4 col-12 mt-3">
                                <div class="d-block c-desc-category">
                                    <i class="fal fa-badge-check"></i>
                                    مسئولیت‌پذیری
                                </div>
                                <div class="text">
                                    ما مسئول سلامت و کیفیت محصولاتی هستیم که به دست شما می‌رسد و همواره به آن پایبندیم.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
