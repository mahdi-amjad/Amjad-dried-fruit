<div class="main-header side-header sticky nav nav-item">
    <div class="container-fluid main-container ">
        <div class="main-header-left ">
            <div class="app-sidebar__toggle mobile-toggle" data-bs-toggle="sidebar">
                <a class="open-toggle" href="javascript:void(0);"><i class="header-icons" data-eva="menu-outline"></i></a>
                <a class="close-toggle" href="javascript:void(0);"><i class="header-icons" data-eva="close-outline"></i></a>
            </div>
            <div class="responsive-logo">
                <a href="index.html" class="header-logo"><img src="{{asset('AdminAssets/assets/img/brand/logo.png')}}" class="logo-11" alt="logo"></a>
                <a href="index.html" class="header-logo"><img src="{{asset('AdminAssets/assets/img/brand/logo-white.png')}}" class="logo-1" alt="logo"></a>
            </div>
        </div>
        <button class="navbar-toggler nav-link icon navresponsive-toggler vertical-icon ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
        </button>
        <div class="mb-0 navbar navbar-expand-lg navbar-nav-right responsive-navbar navbar-dark p-0  mg-lg-s-auto">
            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                <div class="main-header-right">
                    <div class="nav nav-item nav-link " id="bs-example-navbar-collapse-1">
                        <form class="navbar-form" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="input-group-btn">
                                    <button type="reset" class="btn btn-default">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <button type="submit" class="btn btn-default nav-link">
                                        <i class="fe fe-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="dropdown nav-item main-layout">
                        <a href="javascript:void(0)" class="new theme-layout nav-link-bg layout-setting">
                            <span class="dark-layout"><i class="fe fe-moon"></i></span>
                            <span class="light-layout"><i class="fe fe-sun"></i></span>
                        </a>
                    </div>
                    <div class="nav nav-item  navbar-nav-right mg-lg-s-auto">
                        <div class="nav-item full-screen fullscreen-button">
                            <a class="new nav-link full-screen-link" href="javascript:void(0);"><i class="fe fe-maximize"></i></a>
                        </div>

                        <div class="dropdown nav-item main-header-cart">
                            <a class="new nav-link" href="javascript:void(0);"><i class="fe fe-shopping-cart"></i><span class=" badge bg-secondary header-badge rounded-circle">6</span></a>
                            <div class="dropdown-menu">
                                <div class="p-3 text-start bg-primary border-bottom rounded-top-5">
                                    <div class="d-flex align-items-center">
                                        <h6 class="dropdown-title mb-1 tx-15 font-weight-semibold">سبد خرید</h6>
                                        <p class="mb-0 font-weight-semibold tx-muted tx-12 ms-auto">مجموع خرید : 6 عدد</p>
                                    </div>
                                </div>
                                <ul class="list-unstyled main-cart-list shopping-scroll mb-0">
                                    <li class="mb-0 pos-relative border-bottom">
                                        <div class="d-flex pd-x-13 py-2 pos-relative">
                                            <a href="product-cart.html" class="stretched-link"></a>
                                            <div class="avatar-md rounded-5 "><img src="{{asset('AdminAssets/assets/img/ecommerce/01.jpg')}}" alt="img" class="rounded-5"></div>
                                            <div class="flex-1 ms-2 mt-2">
                                                <h6 class="mb-0 tx-default">گلدان گل</h6>
                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-0   tx-14 align-self-end">قیمت : <span class="">25000 تومان</span></p>
                                                    <div class="mt-1 ms-2">
                                                        <p class="mb-0 tx-default tx-12"><span class="me-1 tx-muted">تعداد:</span>2</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pos-absolute mt-2 r-10">
                                            <a href="javascript:void(0);" class="close-btn border rounded-5"><i class="fe fe-x tx-12 text-danger"></i></a>
                                        </div>
                                    </li>
                                    <li class="mb-0 pos-relative border-bottom">
                                        <div class="d-flex pd-x-13 py-2 pos-relative">
                                            <a href="product-cart.html" class="stretched-link"></a>
                                            <div class="avatar-md rounded-5 "><img src="{{asset('AdminAssets/assets/img/ecommerce/02.jpg')}}" alt="img" class="rounded-5"></div>
                                            <div class="flex-1 ms-2 mt-2">
                                                <h6 class="mb-0 tx-default">صندلی نارنجی</h6>
                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-0   tx-14 align-self-end">قیمت : <span class="">125000 تومان </span></p>
                                                    <div class="mt-1 ms-2">
                                                        <p class="mb-0 tx-default tx-12"><span class="me-1 tx-muted">تعداد :</span>1</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pos-absolute mt-2 r-10">
                                            <a href="javascript:void(0);" class="close-btn border rounded-5"><i class="fe fe-x tx-12 text-danger"></i></a>
                                        </div>
                                    </li>
                                    <li class="mb-0 pos-relative border-bottom">
                                        <div class="d-flex pd-x-13 py-2 pos-relative">
                                            <a href="product-cart.html" class="stretched-link"></a>
                                            <div class="avatar-md rounded-5 "><img src="{{asset('AdminAssets/assets/img/ecommerce/04.jpg')}}" alt="img" class="rounded-5"></div>
                                            <div class="flex-1 ms-2 mt-2">
                                                <h6 class="mb-0 tx-default">ساعت هوشمند </h6>
                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-0   tx-14 align-self-end"> قیمت :  <span class="">425000 تومان </span></p>
                                                    <div class="mt-1 ms-2">
                                                        <p class="mb-0 tx-default tx-12"><span class="me-1 tx-muted">تعداد:</span>2</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pos-absolute mt-2 r-10">
                                            <a href="javascript:void(0);" class="close-btn border rounded-5"><i class="fe fe-x tx-12 text-danger"></i></a>
                                        </div>
                                    </li>
                                    <li class="mb-0 pos-relative border-bottom">
                                        <div class="d-flex pd-x-13 py-2 pos-relative">
                                            <a href="product-cart.html" class="stretched-link"></a>
                                            <div class="avatar-md rounded-5 "><img src="{{asset('AdminAssets/assets/img/ecommerce/07.jpg')}}" alt="img" class="rounded-5"></div>
                                            <div class="flex-1 ms-2 mt-2">
                                                <h6 class="mb-0 tx-default">فنجان قهوه </h6>
                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-0   tx-14 align-self-end">قیمت : <span class="">85000 تومان </span></p>
                                                    <div class="mt-1 ms-2">
                                                        <p class="mb-0 tx-default tx-12"><span class="me-1 tx-muted">تعداد :</span>4</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pos-absolute mt-2 r-10">
                                            <a href="javascript:void(0);" class="close-btn border rounded-5"><i class="fe fe-x tx-12 text-danger"></i></a>
                                        </div>
                                    </li>
                                    <li class="mb-0 pos-relative border-bottom">
                                        <div class="d-flex pd-x-13 py-2 pos-relative">
                                            <a href="product-cart.html" class="stretched-link"></a>
                                            <div class="avatar-md rounded-5 "><img src="{{asset('AdminAssets/assets/img/ecommerce/08.jpg')}}" alt="img" class="rounded-5"></div>
                                            <div class="flex-1 ms-2 mt-2">
                                                <h6 class="mb-0 tx-default">گل کاکتوس </h6>
                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-0   tx-14 align-self-end">قیمت : <span class="">45000 تومان </span></p>
                                                    <div class="mt-1 ms-2">
                                                        <p class="mb-0 tx-default tx-12"><span class="me-1 tx-muted">قیمت :</span>3</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pos-absolute mt-2 r-10">
                                            <a href="javascript:void(0);" class="close-btn border rounded-5"><i class="fe fe-x tx-12 text-danger"></i></a>
                                        </div>
                                    </li>
                                    <li class="mb-0 pos-relative ">
                                        <div class="d-flex pd-x-13 py-2 pos-relative">
                                            <a href="product-cart.html" class="stretched-link"></a>
                                            <div class="avatar-md rounded-5 "><img src="{{asset('AdminAssets/assets/img/ecommerce/09.jpg')}}" alt="img" class="rounded-5"></div>
                                            <div class="flex-1 ms-2 mt-2">
                                                <h6 class="mb-0 tx-default">کوله پشتی</h6>
                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-0   tx-14 align-self-end">قیمت : <span class="">265000 تومان </span></p>
                                                    <div class="mt-1 ms-2">
                                                        <p class="mb-0 tx-default tx-12"><span class="me-1 tx-muted">تعداد :</span>1</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pos-absolute mt-2 r-10">
                                            <a href="javascript:void(0);" class="close-btn border rounded-5"><i class="fe fe-x tx-12 text-danger"></i></a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="dropdown-footer text-center">
                                    <a href="product-cart.html" class="btn  btn-primary w-md tx-13">مشاهده سبد <i class="fe fe-arrow-right tx-12 ms-2 lh-1"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown nav-item main-header-notification">
                            <a class="new nav-link" href="javascript:void(0);"><i class="fe fe-bell"></i><span class=" pulse"></span></a>
                            <div class="dropdown-menu">
                                <div class="menu-header-content bg-primary text-start d-flex rounded-top-5">
                                    <div class="">
                                        <h6 class="menu-header-title text-white mb-0">4 اعلان جدید</h6>
                                    </div>
                                    <div class="my-auto ms-auto">
                                        <a class="badge bg-pill bg-success float-end" href="javascript:void(0);">علامت زدن بعنوان خوانده شده</a>
                                    </div>
                                </div>
                                <a class="d-flex p-3 border-bottom" href="mail.html">
                                    <div class="notifyimg bg-warning-transparent">
                                        <i class="fe fe-mail text-warning"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h5 class="notification-label mb-1">پیام جدید</h5>
                                        <div class="notification-subtext">1 ساعت قبل</div>
                                    </div>
                                </a>
                                <div class="main-notification-list Notification-scroll">
                                    <a class="d-flex p-3 border-bottom" href="mail.html">
                                        <div class="notifyimg bg-primary-transparent">
                                            <i class="fe fe-check-circle text-primary"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h5 class="notification-label mb-1">پروژه تعریف شده </h5>
                                            <div class="notification-subtext">1 روز قبل</div>
                                        </div>
                                    </a>
                                    <a class="d-flex p-3  border-bottom" href="mail.html">
                                        <div class="notifyimg bg-purple-transparent">
                                            <i class="fe fe-upload-cloud text-purple"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h5 class="notification-label mb-1">آپدیت جدید</h5>
                                            <div class="notification-subtext">2 روز قبل</div>
                                        </div>
                                    </a>
                                    <a class="d-flex p-3" href="mail.html">
                                        <div class="notifyimg bg-pink-transparent">
                                            <i class="fe fe-file-text text-pink"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h5 class="notification-label mb-1">فایل های قابل دسترس</h5>
                                            <div class="notification-subtext">12 ساعت قبل</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-footer text-center">
                                    <a href="notification.html" class="btn  btn-primary w-md tx-13">مشاهده همه<i class="fe fe-arrow-right tx-12 ms-2 lh-1"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown  nav-item main-header-message ">
                            <a class="new nav-link" href="javascript:void(0);"><i class="fe fe-mail"></i><span class=" pulse-danger"></span></a>
                            <div class="dropdown-menu">
                                <div class="menu-header-content bg-primary text-start d-flex rounded-top-5">
                                    <div class="">
                                        <h6 class="menu-header-title text-white mb-0">5 پیام جدید</h6>
                                    </div>
                                    <div class="my-auto mg-s-auto">
                                        <a class="badge bg-pill bg-info float-end" href="javascript:void(0);">
                                            علامت زدن بعنوان خوانده شده
                                        </a>
                                    </div>
                                </div>
                                <div class="main-message-list chat-scroll">
                                    <a href="mail.html" class="p-3 d-flex border-bottom">
                                        <div class="drop-img cover-image" data-bs-image-src="assets/img/users/9.jpg">
                                            <span class="avatar-status bg-teal"></span>
                                        </div>
                                        <div class="wd-90p">
                                            <div class="d-flex">
                                                <h5 class="mb-1 name">مهسا پور رستم</h5>
                                                <p class="time mb-0 text-end ms-auto float-end">20 دقیقه قبل</p>
                                            </div>
                                            <p class="mb-0 desc">آیا شما برای دریافت محصول آماده هستید..</p>
                                        </div>
                                    </a>
                                    <a href="mail.html" class="p-3 d-flex border-bottom">
                                        <div class="drop-img  cover-image  " data-bs-image-src="assets/img/users/3.jpg">
                                            <span class="avatar-status bg-teal"></span>
                                        </div>

                                        <div class="wd-90p">
                                            <div class="d-flex">
                                                <h5 class="mb-1 name"> سمیرا سلطان پور</h5>
                                                <p class="time mb-0 text-end ms-auto float-end">10 دقیقه قبل</p>
                                            </div>
                                            <p class="mb-0 desc">محتوا های شما بصورت کامل تایید ....</p>
                                        </div>
                                    </a>
                                    <a href="mail.html" class="p-3 d-flex border-bottom">
                                        <div class="drop-img cover-image" data-bs-image-src="assets/img/users/5.jpg">
                                            <span class="avatar-status bg-teal"></span>
                                        </div>
                                        <div class="wd-90p">
                                            <div class="d-flex">
                                                <h5 class="mb-1 name">ساناز مسلمی</h5>
                                                <p class="time mb-0 text-end ms-auto float-end">35 دقیقه قبل</p>
                                            </div>
                                            <p class="mb-0 desc">متاسفانه درخواست شما با موفقیت ثبت نشده است ......</p>
                                        </div>
                                    </a>
                                    <a href="mail.html" class="p-3 d-flex border-bottom">
                                        <div class="drop-img cover-image" data-bs-image-src="assets/img/users/12.jpg">
                                            <span class="avatar-status bg-danger"></span>
                                        </div>
                                        <div class="wd-90p">
                                            <div class="d-flex">
                                                <h5 class="mb-1 name">مجید پور سلامی</h5>
                                                <p class="time mb-0 text-end ms-auto float-end">39 دقیقه قبل</p>
                                            </div>
                                            <p class="mb-0 desc"> محصول شما آماده ارسال است</p>
                                        </div>
                                    </a>
                                    <a href="mail.html" class="p-3 d-flex border-bottom">
                                        <div class="drop-img cover-image" data-bs-image-src="assets/img/users/2.jpg">
                                            <span class="avatar-status bg-teal"></span>
                                        </div>
                                        <div class="wd-90p">
                                            <div class="d-flex">
                                                <h5 class="mb-1 name">سحر ترابی</h5>
                                                <p class="time mb-0 text-end ms-auto float-end">45 دقیقه قبل</p>
                                            </div>
                                            <p class="mb-0 desc"> همه درخواست های شما بررسی شد و نتایج .....</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-footer text-center">
                                    <a href="mail.html" class="btn   btn-primary  w-md tx-13">مشاهده همه<i class="fe fe-arrow-right tx-12 ms-2 lh-1"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown d-none d-md-flex nav-item main-header-grid ">
                            <a class="nav-link icon " data-bs-toggle="dropdown">
                                <i class="fe fe-grid floating"></i>
                            </a>
                            <div class="dropdown-menu ">
                                <div class="menu-header-content bg-primary text-start d-flex rounded-top-5">
                                    <div class="">
                                        <h6 class="menu-header-title text-white mb-0">میانبر ها</h6>
                                    </div>
                                    <div class="my-auto mg-s-auto">
                                        <a class="short-edit" href="javascript:void(0);"><i class="fe fe-edit tx-16 me-2 lh-1"></i></a>
                                        <a class="short-edit" href="javascript:void(0);"><i class="fe fe-plus tx-16  lh-1"></i></a>
                                    </div>
                                </div>
                                <div class="row drop-icon-wrap my-2  p-3">
                                    <div class="col-4">
                                        <a href="mail.html" class=" d-grid justify-content-center    rounded p-1 ">
                                            <div class="main-grid">
                                                <span class="avatar p-2  bg-purple-transparent rounded-3 mx-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="svg-icon" viewBox="0 0 32 32"><path fill="#623aa2" d="M16,14.81,28.78,6.6A3,3,0,0,0,27,6H5a3,3,0,0,0-1.78.6Z" class="color231f20 svgShape" /><path fill="#623aa2" d="M16.54,16.84h0l-.17.08-.08,0A1,1,0,0,1,16,17h0a1,1,0,0,1-.25,0l-.08,0-.17-.08h0L2.1,8.26A3,3,0,0,0,2,9V23a3,3,0,0,0,3,3H27a3,3,0,0,0,3-3V9a3,3,0,0,0-.1-.74Z" class="color231f20 svgShape" /></svg>
                                                </span>
                                                <span class="mt-2 tx-14   text-center">ایمیل</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="calendar.html" class=" d-grid justify-content-center mb-3    rounded p-1 ">
                                            <div class="main-grid">
                                                <span class="avatar p-2  bg-secondary-transparent rounded-3 mx-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="svg-icons" viewBox="0 0 32 32"><path fill="#f66b4e" d="M27 5h-2V4a1 1 0 0 0-2 0v1H9V4a1 1 0 0 0-2 0v1H5a2 2 0 0 0-2 2v4h26V7a2 2 0 0 0-2-2zM3 25a2 2 0 0 0 2 2h22a2 2 0 0 0 2-2V13H3zm9.46-9.12a3 3 0 0 1 3.54-.53 3 3 0 0 1 3.54 4.77L16.71 23a1 1 0 0 1-1.42 0l-2.83-2.83a3 3 0 0 1 0-4.24z" class="color000000 svgShape" data-name="invitation" /></svg>
                                                </span>
                                                <span class="mt-2 tx-14   text-center">تقویم</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="map-leaflet.html" class=" d-grid justify-content-center mb-0   rounded p-1 ">
                                            <div class="main-grid">
                                                <span class="avatar p-2  bg-success-transparent rounded-3 mx-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="svg-icons" viewBox="0 0 14 14"><path fill="#21a544" d="M7 .25c-3.04 0-5.51 2.47-5.51 5.51 0 3.04 4.58 7.99 5.51 7.99.93 0 5.51-4.95 5.51-7.99S10.04.25 7 .25zm0 7.51c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z" class="color2d4356 svgShape" /></svg>
                                                </span>
                                                <span class="mt-2 tx-14  text-center">نقشه</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="product-cart.html" class=" d-grid justify-content-center    rounded p-1 ">
                                            <div class="main-grid">
                                                <span class="avatar p-2  bg-info-transparent rounded-3 mx-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="svg-icons" viewBox="0 0 1792 1792"><path fill="#1ca2d5" d="M1280 704q0-26-19-45t-45-19h-128V512q0-26-19-45t-45-19-45 19-19 45v128H832q-26 0-45 19t-19 45 19 45 45 19h128v128q0 26 19 45t45 19 45-19 19-45V768h128q26 0 45-19t19-45zm-576 832q0 53-37.5 90.5T576 1664t-90.5-37.5T448 1536t37.5-90.5T576 1408t90.5 37.5T704 1536zm896 0q0 53-37.5 90.5T1472 1664t-90.5-37.5-37.5-90.5 37.5-90.5 90.5-37.5 90.5 37.5 37.5 90.5zm128-1088v512q0 24-16 42.5t-41 21.5L627 1146q1 7 4.5 21.5t6 26.5 2.5 22q0 16-24 64h920q26 0 45 19t19 45-19 45-45 19H512q-26 0-45-19t-19-45q0-14 11-39.5t29.5-59.5 20.5-38L332 384H128q-26 0-45-19t-19-45 19-45 45-19h256q16 0 28.5 6.5t20 15.5 13 24.5T453 329t5.5 29.5T463 384h1201q26 0 45 19t19 45z" class="color000000 svgShape" /></svg>
                                                </span>
                                                <span class="mt-2 tx-14 text-center">سبد خرید</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="chat.html" class=" d-grid justify-content-center   rounded p-1 ">
                                            <div class="main-grid">
                                                <span class="avatar p-2  bg-warning-transparent rounded-3 mx-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="svg-icons" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                                        <path fill="#ffc107" d="M19,2H5C3.3,2,2,3.3,2,5v10c0,1.7,1.3,3,3,3h11.6l3.7,3.7c0.4,0.4,1,0.4,1.4,0c0.2-0.2,0.3-0.4,0.3-0.7V5
                                                            C22,3.3,20.7,2,19,2z M9,13c0,0.6-0.4,1-1,1s-1-0.4-1-1v-1c0-0.6,0.4-1,1-1s1,0.4,1,1V13z M13,13c0,0.6-0.4,1-1,1s-1-0.4-1-1V9
                                                            c0-0.6,0.4-1,1-1s1,0.4,1,1V13z M17,13c0,0.6-0.4,1-1,1s-1-0.4-1-1V7c0-0.6,0.4-1,1-1s1,0.4,1,1V13z" class="color000000 svgShape" />
                                                    </svg>
                                                </span>
                                                <span class="mt-2 tx-14 text-center">گفتگو </span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="settings.html" class=" d-grid justify-content-center rounded p-1 ">
                                            <div class="main-grid">
                                                <span class="avatar p-2  bg-danger-transparent rounded-3 mx-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="svg-icons" enable-background="new 0 0 128 128" viewBox="0 0 128 128">
                                                        <path fill="#f64e4e" d="M122.3,97.9L105.5,84c-4.4-4.2-7.7-3.4-9.6-2.2c-1.1,0.7-16.3,13-16.3,13c-7.4,1-18.9-7.3-28.9-17.5
                                                            c-10.2-10-18.5-21.5-17.5-28.9c0,0,12.3-15.1,13-16.3c1.2-1.9,2-5.2-2.2-9.6L30.1,5.7C26.4,1.3,19.8,1,15.8,5.1
                                                            c-1.2,1.2-2.2,2.3-2.8,3.1c-3,3.7-6.7,9.7-9.2,15c-1.9,4-2.1,8.5-0.7,12.7c4.4,13.1,13.5,31.3,32,52.5l0.3,0.3
                                                            c0.2,0.3,3.6,3.6,3.9,3.9l0.3,0.3c21.2,18.5,39.4,27.6,52.5,32c4.2,1.4,8.7,1.2,12.7-0.7c5.3-2.5,11.3-6.2,15-9.2
                                                            c0.7-0.6,1.8-1.6,3.1-2.8C127,108.2,126.7,101.6,122.3,97.9z" class="color343433 svgShape" />
                                                    </svg>
                                                </span>
                                                <span class="mt-2 tx-14  text-center">مخاطب ها</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="dropdown-footer text-center">
                                    <a href="settings.html" class="btn  btn-primary w-md tx-13">مشاهده همه<i class="fe fe-arrow-right tx-12 ms-2 lh-1"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown main-profile-menu nav nav-item nav-link">
                            <a class="profile-user d-flex" href="javascript:void(0)"><img src="{{asset('AdminAssets/assets/img/users/5.jpg')}}" alt="user-img" class="rounded-circle mCS_img_loaded"><span></span></a>

                            <div class="dropdown-menu">
                                <div class="main-header-profile header-img bg-primary rounded-top-5 p-3">
                                    <h6> ممد دولوپ</h6><span> طراح سایت</span>
                                </div>
                                <a class="dropdown-item" href="profile.html"><i class="fe fe-user"></i> پروفایل من</a>
                                <a class="dropdown-item" href="editprofile.html"><i class="fe fe-edit"></i> ویرایش پروفایل</a>
                                <a class="dropdown-item" href="profile.html"><i class="fe fe-clock"></i> ورود های فعال</a>
                                <a class="dropdown-item" href="profile.html"><i class="fe fe-settings"></i> تنطیمات حساب</a>
                                <a class="dropdown-item" href="login.html"><i class="fe fe-log-out"></i> خروج</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex header-setting-icon">
            <a class="nav-link icon demo-icon" href="javascript:void(0);">
                <i class="fe fe-settings  fe-spin"></i>
            </a>
        </div>
    </div>
</div>
