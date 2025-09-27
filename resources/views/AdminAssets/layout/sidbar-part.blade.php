<div class="sticky">
    <aside class="app-sidebar sidebar-scroll">
        <div class="main-sidebar-header active">
            <a class="desktop-logo logo-light active" href="index.html"><img
                    src="{{ asset('AdminAssets/assets/img/brand/logo.png') }}" class="main-logo" alt="logo"></a>
            <a class="desktop-logo logo-dark active" href="index.html"><img
                    src="{{ asset('AdminAssets/assets/img/brand/logo-white.png') }}" class="main-logo"
                    alt="logo"></a>
            <a class="logo-icon mobile-logo icon-light active" href="index.html"><img
                    src="{{ asset('AdminAssets/assets/img/brand/favicon.png') }}" alt="logo"></a>
            <a class="logo-icon mobile-logo icon-dark active" href="index.html"><img
                    src="{{ asset('AdminAssets/assets/img/brand/favicon-white.png') }}" alt="logo"></a>
        </div>
        <div class="main-sidemenu">
            <div class="main-sidebar-loggedin">
                <div class="app-sidebar__user">
                    <div class="dropdown user-pro-body text-center">
                        <div class="user-pic">
                            <img src="{{ asset('AdminAssets/assets/img/users/5.jpg') }}" alt="user-img"
                                class="rounded-circle mCS_img_loaded">
                        </div>
                        <div class="user-info mb-4">
                            <h6 class=" mb-0 text-dark">ممد دولوپ</h6>
                            <span class="text-muted app-sidebar__user-name text-sm">طراح سایت</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu ">
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('Panel.Dashborad') }}"><i
                            class="side-menu__icon bx bx-home-alt"></i><span class="side-menu__label">داشبورد</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
                            class="side-menu__icon bx bx-box"></i><span class="side-menu__label">دسته بندی</span><i
                            class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane tab-content-show ">
                                        <ul class="sidemenu-list">
                                            <li><a class="slide-item" href="{{ route('Panel.Category.Create') }}"> اضافه
                                                    کردن دسته بندی </a></li>
                                            <li><a class="slide-item" href="{{ route('Panel/Category/categories') }}">
                                                    لیست دسته بندی ها</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
                            class="side-menu__icon fa fa-store"></i><span class="side-menu__label">محصولات</span><i
                            class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane tab-content-show ">
                                        <ul class="sidemenu-list">
                                            <li><a class="slide-item" href="{{ route('Panel.Product.Create') }}"> اضافه
                                                    کردن محصول </a></li>
                                            <li><a class="slide-item" href="{{ route('products.index') }}"> لیست
                                                    محصولات</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item " data-bs-toggle="slide" href="javascript:void(0);"><i
                            class="side-menu__icon bx bx-box"></i><span class="side-menu__label">اسلایدر ها</span><i
                            class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu" style="display: none;">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0 is-expanded">
                                <div class="tab-content">
                                    <div class="tab-pane tab-content-show  is-expanded" role="tabpanel">
                                        <ul class="sidemenu-list open">
                                            <li><a class="slide-item" href="{{ route('Panel.Slider.Create') }}">اضافه
                                                    کردن اسلایدر </a></li>
                                            <li><a class="slide-item" href="{{ route('Panel.Slider.Slider') }}">لیست
                                                    اسلایدر ها</a></li>
                                            <li><a class="slide-item"
                                                    href="{{ route('Panel.Slider.Createslider') }}">اضافه
                                                    کردن اسلایدر 2 </a></li>
                                            <li><a class="slide-item"
                                                    href="{{ route('Panel.Slider.Galleryslider') }}">لیست
                                                    اسلایدر ها 2</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
                            class="side-menu__icon bx bx-home-alt"></i><span class="side-menu__label">مقالات</span><i
                            class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu" style="display: none;">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0 is-expanded">
                                <div class="tab-content">
                                    <div class="tab-pane tab-content-show  is-expanded" role="tabpanel">
                                        <ul class="sidemenu-list open">
                                            <li><a class="slide-item" href="{{ route('Panel.Post.Create') }}">اضافه
                                                    کردن مقاله </a></li>
                                            <li><a class="slide-item" href="{{ route('Panel.Post.posts') }}">لیست
                                                    مقالات</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
                            class="side-menu__icon bx bx-home-alt"></i><span class="side-menu__label">تخفیفات</span><i
                            class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu" style="display: none;">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0 is-expanded">
                                <div class="tab-content">
                                    <div class="tab-pane tab-content-show  is-expanded" role="tabpanel">
                                        <ul class="sidemenu-list open">
                                            <li><a class="slide-item" href="{{ route('discounts.create') }}">اضافه
                                                    کردن تخفیف </a></li>
                                            <li><a class="slide-item" href="{{ route('discounts.index') }}">لیست
                                                    تخفیفات</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
                            class="side-menu__icon bx bx-home-alt"></i><span class="side-menu__label">مدیریت پاصفحه</span><i
                            class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu" style="display: none;">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0 is-expanded">
                                <div class="tab-content">
                                    <div class="tab-pane tab-content-show  is-expanded" role="tabpanel">
                                        <ul class="sidemenu-list open">
                                            <li><a class="slide-item" href="{{ route('panel.footershow') }}">
                                                     تنظیمات پاصفحه </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                   <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
                            class="side-menu__icon bx bx-home-alt"></i><span class="side-menu__label">آفرهای تصویری</span><i
                            class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu" style="display: none;">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0 is-expanded">
                                <div class="tab-content">
                                    <div class="tab-pane tab-content-show  is-expanded" role="tabpanel">
                                        <ul class="sidemenu-list open">
                                            <li><a class="slide-item" href="{{ route('Panel.Offer.offershow') }}">
                                                      اضافه کردن افر تصویری </a></li>
                                                        <li><a class="slide-item" href="{{ route('Panel/Offer/offerlist') }}">
                                                    لیست  آفر های تصویری </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>



            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </aside>
</div>
