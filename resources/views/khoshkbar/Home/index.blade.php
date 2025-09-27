@extends('khoshkbar.layout.master')

@section('content')
    <section class="container-fluid slider">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12 ps-md-0  order-lg-1">
                <div class="owl-carousel owl-theme owl-slider">
                    @foreach ($sliders as $slider)
                        <a class="item img-pro-banner" href="{{ $slider->url }}">
                            <img src="{{ asset('AdminAssets.Slider-image/' . $slider->image) }}" alt="slider" />
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12 banner  order-lg-0">
                @foreach ($slidertwos as $slidertwo)
                    <a class="item img-pro-banner" href="{{ $slidertwo->url }}">
                        <img src="{{ asset('AdminAssets.Slider-image/' . $slidertwo->image) }}">
                    </a>
                @endforeach

            </div>

        </div>
    </section>
    <section class="container-fluid logo-section">
        <div class="row">
            <div class="col-12 p-0">
                <div class="owl-carousel owl-theme owl-logo">
                    @foreach ($categories as $category)
                        <div class="item">
                            <a href="{{ route('products.byCategory', $category->id) }}" class="d-block">
                                <img src="{{ asset('AdminAssets.Category-image/' . $category->image) }}" alt="">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="container-fluid wnd">
        <div class="row align-items-center">
            <div class="col-lg-3 col-2 p-0 list-t-wnd">
                <div class="row row-align">
                    <div class="col-12 p-0  text-center">
                        <img src="{{ asset('Assets/images/amazing-typo.svg') }}" class="img-fluid">
                    </div>
                    <div class="col-lg-12  col-12 text-center pr-0">
                        <h5 class="title-wnd">
                            <img src="{{ asset('Assets/images/wnd.png') }}" class="img-fluid" />
                        </h5>
                    </div>

                </div>

                <div class="row mt-3">
                    <div class="col-12 text-center more ">
                        <a href="{{ route('All_product') }}"><span>مشاهده محصولات</span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-10 p-0 list-wnd">
                <div class="owl-carousel owl-theme owl-wnd">
                    @foreach ($productspecials as $productspecial)
                        <div class="item">
                            @php
                                $discount = $productspecial->activeDiscount();
                                $price = $productspecial->discountedPrice();
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
                                        <a href="{{ route('Product', $productspecial->id) }}" class="img-pro-wnd"
                                            target="_blank">
                                            <div class="dark-overlay removeFocusIndicator"></div>
                                            <img src="{{ asset('AdminAssets.Product-image/' . $productspecial->image) }}"
                                                alt="">
                                        </a>
                                    </div>
                                </div>

                            </div>
                            <div class="row mt-2">
                                <div class="col-12 text-center pro-name p-2">
                                    <a href="{{ route('Product', $productspecial->id) }}">{{ $productspecial->name }}</a>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-4 d-none d-md-block cost text-right">

                                </div>
                                <div class="col-md-8 col-12 cost text-end pr-3">
                                    @if ($price > 0)
                                        @if ($productspecial->activeDiscount())
                                            <span class="old-cost">{{ number_format($productspecial->price) }}</span>
                                            <br>
                                            <span class="cost-total">{{ number_format($price) }}</span> <span
                                                class="unit">تومان</span>
                                        @else
                                            <span class="cost-total">{{ number_format($productspecial->price) }}</span>
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
        </div>
    </section>
    <section class="container-fluid categori-section pt-3">
        <div class="row">
            <div class="col-12 p-0 text-center">
                <h2 class="caption-section">
                    <span>محصولات
                        <i class="color">جدید</i>
                    </span>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto col-12 p-0">
                <div class="owl-carousel owl-theme owl-pro">
                    @foreach ($productnews as $productnew)
                        <div class="item">
                            @php
                                $discount = $productnew->activeDiscount();
                                $price = $productnew->discountedPrice();
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
                                        <a href="{{ route('Product', $productnew->id) }}" class="img-pro" target="_blank">
                                            <div class="dark-overlay removeFocusIndicator"></div>
                                            <img src="{{ asset('AdminAssets.Product-image/' . $productnew->image) }}"
                                                alt="" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12 text-center pro-name p-0">
                                    <a href="{{ route('Product', $productnew->id) }}">{{ $productnew->name }}</a>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-4 d-none d-md-block cost text-left">
                                </div>
                                <div class="col-md-8 col-12 cost text-end pl-0">
                                     @if ($price > 0)
                                        @if ($productnew->activeDiscount())
                                            <span class="old-cost">{{ number_format($productnew->price) }}</span>
                                            <br>
                                            <span class="cost-total">{{ number_format($price) }}</span> <span
                                                class="unit">تومان</span>
                                        @else
                                            <span class="cost-total">{{ number_format($productnew->price) }}</span>
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
        </div>
    </section>
    <section class="container-fluid banner">
        <div class="row row-banner">
            @foreach ($offerlists as $offerlist)
                <div class="col-lg-3 col-md-6 col-sm-6 col-6 pr-padding">
                    <a href="{{ $offerlist->link }}" class="img-box img-pro-banner">
                        <img src="{{ asset('AdminAssets.Offer-image/' . $offerlist->image) }}" alt="" />
                    </a>
                </div>
            @endforeach

        </div>
    </section>
    <section class="container-fluid categori-section pt-3">
        <div class="row">
            <div class="col-12 p-0 text-center">
                <h2 class="caption-section">
                    <span>محصولات
                        <i class="color">پیشنهادی</i>
                    </span>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto col-12 p-0">
                <div class="owl-carousel owl-theme owl-pro">
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
                                        <a href="{{ route('Product', $productsuggested->id) }}" class="img-pro"
                                            target="_blank">
                                            <div class="dark-overlay removeFocusIndicator"></div>
                                            <img src="{{ asset('AdminAssets.Product-image/' . $productsuggested->image) }}"
                                                alt="" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12 text-center pro-name p-0">
                                    <a
                                        href="{{ route('Product', $productsuggested->id) }}">{{ $productsuggested->name }}</a>
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
        </div>
    </section>
    <section class="container-fluid news-section ps-0 pe-0">
        <div class="row">
            <div class="col-12 p-0 text-center">
                <h2 class="caption-section">
                    <span>مقالات
                        <i class="color">جدید</i>
                    </span>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="ol-12 pr-md-30 pl-md-60">
                <div class="owl-carousel owl-theme owl-news owl-rtl owl-loaded owl-drag">
                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                            style="transform: translate3d(495px, 0px, 0px); transition: 0.45s; width: 1297px; padding-left: 30px; padding-right: 30px;">
                            @foreach ($posts as $post)
                                <div class="owl-item" style="width: 217.333px; margin-left: 30px;"><a
                                        href="{{ route('Post', $post->id) }}" class="item">
                                        <div class="d-block position-relative img-news">
                                            <img src="{{ asset('AdminAssets.Post-image/' . $post->image) }}"
                                                class="img-fluid" alt="">
                                        </div>
                                        <div class="d-block news-title">{{ $post->name }}</div>
                                        <div class="d-block news-short-desc"> {!! substr($post->content, 0, 220) . '...' !!}
                                        </div>
                                    </a></div>
                            @endforeach
                        </div>

                    </div>
                    <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><i
                                class="fas fa-angle-double-left"></i></button><button type="button" role="presentation"
                            class="owl-next"><i class="fas fa-angle-double-right"></i></button></div>
                    <div class="owl-dots disabled"><button role="button"
                            class="owl-dot active"><span></span></button><button role="button"
                            class="owl-dot"><span></span></button></div>
                </div>
            </div>
        </div>
    </section>
@endsection
