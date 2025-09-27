<section class="container-fluid header">
    <!--نمایش گوشی-->
    <div class="row row-menu-mob pt-3 pb-2 align-items-center">
        <div class="col-6">
            <div class="menuTrigger-icon">
                <span class="menuTrigger">
                    <i class="fal fa-bars"></i>
                </span>
                <span class="shop d-xl-none d-lg-none">
                    <span class="shop">
                        <button type="button" onclick="window.location.href='{{ route('cart.step1') }}'" class="shop-link d-inline-block dropdown-toggle" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="img-shop  position-relative">
                                <span class="count">0</span>
                            </span>
                        </button>

                    </span>
                </span>
            </div>
        </div>
        <div class="col-6 text-end pe-0">
            <a href="{{ route('home') }}" class="d-inline-block">
                <img src="{{ asset('Assets/images/logoamjad.png') }}" class="img-fluid" alt="">
            </a>
        </div>
    </div>
    <div class="row align-items-center pt-3">
        <div class="col-lg-3 col-md-3 d-none d-lg-block">
            <div class="d-block logo text-start">
                <a href="{{ route('home') }}" class="d-inline-block">
                    <img src="{{ asset('Assets/images/logoamjad.png') }}" style="height: 120px" class="img-fluid"
                        alt="">
                </a>
            </div>
        </div>
        <div class="col-lg-5 col-md-9 col-11 search-box">
            <div class="d-block">
                <form class="frm-search" action="{{ route('All_product') }}" method="GET">
                    <input type="text" value="{{ request('search') }}" name="search" class="form-control"
                        placeholder="محصول مورد نظر خود را جستجو کنید ...">
                     <button type="submit" class="btn-search">
                <span class="img-search icon-slice"></span>
            </button>
                </form>
            </div>
        </div>
        <div class="col-lg-4 col-md-3 col-1  text-end right-toolbar ">
            <span class="register">
    @if (auth()->check())
        <div class="dropdown">
            <button type="button" class="btn btn-primary dropdown-toggle"
                data-bs-toggle="dropdown" style="background: linear-gradient(135deg, #5e8e3e, #4a7332); color: white; padding: 12px 24px; border-radius: 8px; font-weight: 600; transition: all 0.3s ease; border: none; cursor: pointer; width: 100%;"
                aria-expanded="false">
                سلام، {{ auth()->user()->name }}
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('Dashboard') }}">پنل کاربری</a>
                <a href="#" class="dropdown-item"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">خروج
                </a>
                @can('access-panel')
                    <a class="dropdown-item" href="{{ route('Panel.Post.Create') }}">پنل مدیریت</a>
                @endcan
            </div>
        </div>
        <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none">
            @csrf
        </form>
    @else
        <a href="{{ route('register') }}" class="d-inline-block">
            ثبت نام
        </a>
    @endif
</span>

            <span class="shop">
                <button type="button" onclick="window.location.href='{{ route('cart.step1') }}'"
                    class="shop-link d-inline-block dropdown-toggle" id="dropdownMenuButton1">
                    <span class="img-shop position-relative">
                        <span class="count">0</span>
                    </span>
                </button>
            </span>
        </div>
    </div>
    <!--پایان نمایش گوشی-->
    <div class="row row-header">
        <div class="col-12  menu">
            <nav class="c-navi js-navi">
                <div class="c-navi__row">
                    <ul class="c-navi-new-list">
                        <li class="c-navi-new-list__categories">
                            <ul class="c-navi-new-list__category-item p-0">
                                <li class="c-navi-new-list__a-hover js-navi-new-list-category-hover"
                                    style="width: 72px; right: 964.9px; transform: scaleX(0);">
                                    <div></div>
                                </li>

                                <li class="js-categories-bar-item">
                                    <a href="{{ route('home') }}"
                                        class="c-navi-new-list__category-link  c-navi-new-list__category-link--bold">صفحه
                                        اصلی</a>
                                </li>
                                <li class="js-categories-bar-item">
                                    <a href="{{ route('All_product') }}"
                                        class="c-navi-new-list__category-link  c-navi-new-list__category-link--bold">محصولات
                                    </a>
                                </li>
                                <li class="js-categories-bar-item">
                                    <a href="{{ route('products.wholesale') }}"
                                        class="c-navi-new-list__category-link  c-navi-new-list__category-link--bold">خرید
                                        عمده</a>
                                </li>
                                  <li class="js-categories-bar-item">
                                    <a href="{{ route('Allpost') }}"
                                        class="c-navi-new-list__category-link  c-navi-new-list__category-link--bold">بلاگ
                                        </a>
                                </li>
                                <li class="js-categories-bar-item">
                                    <a href="{{ route('About') }}"
                                        class="c-navi-new-list__category-link  c-navi-new-list__category-link--bold">درباره
                                        ما</a>
                                </li>
                                <li class="js-categories-bar-item">
                                    <a href="{{ route('Contact') }}"
                                        class="c-navi-new-list__category-link  c-navi-new-list__category-link--bold">تماس با ما
                                        </a>
                                </li>


                            </ul>
                        </li>
                        <li class="ms-auto support ">
                            <span>پشتیبانی:</span>
                            <span><a href="#">0914<span class="color">5015158</span></a></span>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</section>
