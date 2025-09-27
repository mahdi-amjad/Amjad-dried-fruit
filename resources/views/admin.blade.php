@extends('AdminAssets.layout.master')

@section('content')
<div class="main-content-body">
    <div class="row row-cards">
        <div class="col-xl-6 col-xxl-3 col-sm-12 col-lg-6 col-md-6">
            <div class="card card-img-holder text-default bg-color">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="my-auto">
                            <div class="circle-icon bg-primary text-center align-self-center shadow-primary"><img src="{{ asset('AdminAssets/assets/img/svgicons/circle.svg') }}" alt="circle" class="card-img-absolute"><i class="bx bx-user tx-30 icon-user-bx text-white"></i></div>
                        </div>
                        <div class="project-content">
                            <h3 class="mb-0 tx-18">فالور ها</h3>
                            <div class="">
                                <span class="badge bg-success-transparent tx-success fs-10">65%</span>
                                <span class="px-2 text-muted">ماه گذشته</span>
                            </div>
                        </div>
                        <h2 class="mt-2 ms-auto">10,257</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-xxl-3 col-sm-12 col-lg-6 col-md-6">
            <div class="card card-img-holder text-default bg-color">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="my-auto">
                            <div class="circle-icon bg-secondary text-center align-self-center shadow-secondary"><img src="assets/img/svgicons/circle.svg" alt="circle" class="card-img-absolute"><i class="bx bx-user tx-30 icon-user-bx  text-white"></i></div>
                        </div>
                        <div class="project-content">
                            <h3 class="mb-0 tx-18">لایک ها</h3>
                            <div class="">
                                <span class="badge bg-success-transparent tx-success fs-10">65%</span>
                                <span class="px-2 text-muted">ماه گذشته</span>
                            </div>
                        </div>
                        <h2 class="mt-2 ms-auto">17,257</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-xxl-3 col-sm-12 col-lg-6 col-md-6">
            <div class="card card-img-holder text-default bg-color">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="my-auto">
                            <div class="circle-icon bg-info text-center align-self-center shadow-info"><img src="assets/img/svgicons/circle.svg" alt="circle" class="card-img-absolute"><i class="bx bx-user tx-30 icon-user-bx  text-white"></i></div>
                        </div>
                        <div class="project-content">
                            <h3 class="mb-0 tx-18">کامنت ها</h3>
                            <div class="">
                                <span class="badge bg-secondary-transparent tx-secondary fs-10">65%</span>
                                <span class="px-2 text-muted"> ماه گذشته</span>
                            </div>
                        </div>
                        <h2 class="mt-2 ms-auto">157</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-xxl-3 col-sm-12 col-lg-6 col-md-6">
            <div class="card card-img-holder text-default bg-color">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="my-auto">
                            <div class="circle-icon bg-success text-center align-self-center shadow-success"><img src="assets/img/svgicons/circle.svg" alt="circle" class="card-img-absolute"><i class="bx bx-user tx-30 icon-user-bx  text-white"></i></div>
                        </div>
                        <div class="project-content">
                            <h3 class="mb-0 tx-18">پست ها</h3>
                            <div class="">
                                <span class="badge bg-secondary-transparent tx-secondary fs-10">65%</span>
                                <span class="px-2 text-muted">ماه گذشته</span>
                            </div>
                        </div>
                        <h2 class="mt-2 ms-auto">1403</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
    <div class="row row-sm ">
        <div class="col-xl-8 col-md-12 col-lg-12 ">
            <div class="card overflow-hidden">
                <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-10">گزارش فروش</h4>
                        <div class="dropdown">
                            <a href="javascript:void(0);" aria-expanded="false" aria-haspopup="true" class="px-2 py-1 rounded-1 tx-medium tx-12 bg-primary-gradient text-white" data-bs-toggle="dropdown" id="dropdownMenuButton">سالانه <i class="fe fe-chevron-down mx-1"></i></a>
                            <div class="dropdown-menu tx-13">
                                <a class="dropdown-item" href="javascript:void(0);">روزانه</a>
                                <a class="dropdown-item" href="javascript:void(0);">ماهانه</a>
                            </div>
                        </div>
                    </div>
                    <p class="tx-13 text-muted mb-2">بودجه پروژه ابزاری است که توسط مدیران پروژه برای برآورد هزینه کل یک پروژه استفاده می شود. <a href="javascript:void(0)">بیشتر بدانید</a></p>
                </div>
                <div class="card-body pd-y-7">
                    <div id="project-budget"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 col-lg-6">
            <div class="card ">
                <div class="card-header">
                    <div class="card-title">همه وظایف</div>
                </div>
                <div class="card-body p-4">
                    <div class="chats-wrap">
                        <div class="chat-details mb-3">
                            <h4 class="mb-0">
                                <span class="h5 font-weight-normal">گزارش فروش</span>
                                <span class="float-end mt-1 tx-14   btn btn-sm text-default">95%</span>
                            </h4>
                            <div class="progress progress-md mt-3">
                                <div class="progress-bar progress-bar-striped bg-flat-primary progress-bar-animated" style="width: 70%"></div>
                            </div>
                        </div>
                        <div class="chat-details mb-3">
                            <h4 class="mb-0">
                                <span class="h5 font-weight-normal">تکمیل لیست</span>
                                <span class="float-end  mt-1 tx-14  btn btn-sm text-default">84%</span>
                            </h4>
                            <div class="progress progress-md mt-3">
                                <div class="progress-bar progress-bar-striped bg-flat-info progress-bar-animated" style="width: 60%"></div>
                            </div>
                        </div>
                        <div class="chat-details mb-3">
                            <h4 class="mb-0">
                                <span class="h5 font-weight-normal">گزارش خرید</span>
                                <span class="float-end  mt-1 tx-14  btn btn-sm text-default">44%</span>
                            </h4>
                            <div class="progress progress-md mt-3">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-flat-warning" style="width: 47%"></div>
                            </div>
                        </div>
                        <div class="chat-details mb-3">
                            <h4 class="mb-0">
                                <span class="h5 font-weight-normal">برگرداندن پیام ها</span>
                                <span class="float-end  mt-1 tx-14  btn btn-sm text-default">64%</span>
                            </h4>
                            <div class="progress progress-md mt-3">
                                <div class="progress-bar progress-bar-striped progress-bar-animated  bg-flat-success" style="width: 75%"></div>
                            </div>
                        </div>
                        <div class="chat-details mb-3">
                            <h4 class="mb-0">
                                <span class="h5 font-weight-normal">برگرداندن پیام ها</span>
                                <span class="float-end  mt-1 tx-14  btn btn-sm text-default">34%</span>
                            </h4>
                            <div class="progress progress-md mt-3">
                                <div class="progress-bar progress-bar-striped progress-bar-animated  bg-flat-danger" style="width: 45%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header border-bottom">
                    <h5 class="card-title"> خلاصه فروش</h5>
                </div>
                <div class="card-body">
                    <div class="activity">
                        <div class="timeline-section bg-primary"><i class='bx bx-bar-chart-alt'></i></div>
                        <div class="time-activity">
                            <div class="item-activity">
                                <div class="d-flex">
                                    <div class="mt-1">
                                        <h5 class="mb-0">کل درآمد</h5>
                                        <span class="mb-0  text-muted">سود هفتگی</span>
                                    </div>
                                    <div class="ms-auto">
                                        <h4 class="font-weight-semibold label-medium-size mt-2 mb-0 text-primary me-2">15230000 ريال</h4>
                                        <span class="mb-0 tx-12 text-muted">75% افزایش یافت</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="timeline-section bg-success"><i class='bx bx-wallet-alt'></i></div>
                        <div class="time-activity">
                            <div class="item-activity">
                                <div class="d-flex">
                                    <div class="mt-1">
                                        <h5 class="mb-0">کل مالیات</h5>
                                        <span class="mb-0  text-muted">سود هفتگی</span>
                                    </div>
                                    <div class="ms-auto">
                                        <h4 class="font-weight-semibold label-medium-size mt-2 mb-0 text-success me-2">1526000 ريال</h4>
                                        <span class="mb-0 tx-12  text-muted">62% افزایش یافت</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="timeline-section bg-info"><i class='bx bx-money'></i></div>
                        <div class="time-activity">
                            <div class="item-activity">
                                <div class="d-flex">
                                    <div class="mt-1">
                                        <h5 class="mb-0">درآمد کلی</h5>
                                        <span class="mb-0  text-muted">سود هفتگی</span>
                                    </div>
                                    <div class="ms-auto">
                                        <h4 class="font-weight-semibold label-medium-size mt-2 mb-0 text-info me-2">1430000 ريال</h4>
                                        <span class="mb-0 tx-12 text-muted">55% افزایش یافت</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="timeline-section bg-warning"><i class='bx bxs-hourglass-bottom'></i></div>
                        <div class="time-activity">
                            <div class="item-activity">
                                <div class="d-flex">
                                    <div class="mt-1">
                                        <h5 class="mb-0">مجموع هزینه ها</h5>
                                        <span class="mb-0  text-muted">سود هفتگی</span>
                                    </div>
                                    <div class="ms-auto">
                                        <h4 class="font-weight-semibold label-medium-size mt-2 mb-0 text-warning me-2">4000000 ريال</h4>
                                        <span class="mb-0 tx-12 text-muted">25% افزایش یافت</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="timeline-section bg-secondary"><i class='bx bx-happy-heart-eyes'></i></div>
                        <div class="time-activity">
                            <div class="item-activity mb-0">
                                <div class="d-flex">
                                    <div class="mt-1">
                                        <h5 class="mb-0">بازدیدکنندگان مشتری</h5>
                                        <span class="mb-0  text-muted">بازدیدکنندگان هفتگی</span>
                                    </div>
                                    <div class="ms-auto">
                                        <h4 class="font-weight-semibold label-medium-size mt-2 mb-0 text-secondary me-2">740000 ريال</h4>
                                        <span class="mb-0 tx-12 text-muted">45% افزایش یافت</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header border-bottom">
                    <h5 class="card-title">وظایف محول شده</h5>
                </div>
                <div class="card-body p-0">
                    <div class="clearfix border-bottom p-3 ">
                        <div class="col mb-0">
                            <div class="d-flex main-user-img">
                                <div class="main-img-user avatar  avatar-md">
                                    <img alt="avatar" class="rounded-circle" src="{{asset('AdminAssets/assets/img/users/2.jpg')}}">
                                </div>
                                <div class="float-start mt-2 ms-2">
                                    <h5 class="tx-15 mb-0"> دنیس دالپیاز</h5>
                                    <p class="mb-0 text-muted">یک پروژه جدید اضافه کنید</p>
                                </div>
                                <div class="ms-auto mt-2 ps-2">
                                    <h6 class="tx-15 mb-0">قالب Angular JS</h6>
                                    <small class="text-muted">30 دقیقه پیش</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix border-bottom p-3 ">
                        <div class="col mb-0">
                            <div class="d-flex main-user-img">
                                <div class="main-img-user avatar  avatar-md">
                                    <img alt="avatar" class="rounded-circle" src="assets/img/users/1.jpg">
                                </div>
                                <div class="float-start mt-2 ms-2">
                                    <h5 class="tx-15 mb-0"> جوی کرونل</h5>
                                    <p class="mb-0 text-muted">پروژه های جدید اضافه شد</p>
                                </div>
                                <div class="ms-auto mt-2 ps-2">
                                    <h6 class="tx-15 mb-0">قالب HTML رایگان</h6>
                                    <small class="text-muted">30 دقیقه پیش</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix border-bottom p-3 ">
                        <div class="col mb-0">
                            <div class="d-flex main-user-img">
                                <div class="main-img-user avatar  avatar-md">
                                    <img alt="avatar" class="rounded-circle" src="assets/img/users/7.jpg">
                                </div>
                                <div class="float-start mt-2 ms-2">
                                    <h5 class="tx-15 mb-0"> نوربرت بریدول</h5>
                                    <p class="mb-0 text-muted">پروژه های جدید اضافه شد</p>
                                </div>
                                <div class="ms-auto mt-2 ps-2">
                                    <h6 class="tx-15 mb-0">قالب HTML رایگان</h6>
                                    <small class="text-muted">40 دقیقه پیش</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix border-bottom p-3 ">
                        <div class="col mb-0">
                            <div class="d-flex main-user-img">
                                <div class="main-img-user avatar  avatar-md">
                                    <img alt="avatar" class="rounded-circle" src="assets/img/users/3.jpg">
                                </div>
                                <div class="float-start mt-2 ms-2">
                                    <h5 class="tx-15 mb-0">  بردول ژوربرت</h5>
                                    <p class="mb-0 text-muted">پروژه های جدید اضافه شد</p>
                                </div>
                                <div class="ms-auto mt-2">
                                    <h6 class="tx-15 mb-0">داشبوردهای رابط کاربری</h6>
                                    <small class="text-muted">40 دقیقه پیش</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix  p-3 ">
                        <div class="col mb-0">
                            <div class="d-flex main-user-img">
                                <div class="main-img-user avatar  avatar-md">
                                    <img alt="avatar" class="rounded-circle" src="assets/img/users/9.jpg">
                                </div>
                                <div class="float-start mt-2 ms-2">
                                    <h5 class="tx-15 mb-0">پردول رابرت</h5>
                                    <p class="mb-0 text-muted">پروژه های جدید اضافه شد</p>
                                </div>
                                <div class="ms-auto mt-2">
                                    <h6 class="tx-15 mb-0">قالب Angular JS</h6>
                                    <small class="text-muted">40 دقیقه پیش</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header border-bottom">
                    <h5 class="card-title">تراکنش های اخیر</h5>
                </div>
                <div class="card-body p-0">
                    <div class="clearfix border-bottom p-3 ">
                        <div class="col mb-0">
                            <div class="d-flex">
                                <div class="avatar avatar-md bg-success-transparent rounded-circle">
                                    ا
                                </div>
                                <div class="float-start mt-2 ms-2">
                                    <h6 class="mb-1">اسکار نومنی</h6>
                                    <p class="mb-0 tx-13 text-muted">بهبود برنامه</p>
                                </div>
                                <div class="ms-auto mt-2">
                                    <h6 class="mb-1 tx-15 font-weight-semibold">
                                        4500000 ريال<i class="fas fa-level-up-alt ms-2 text-success m-l-10"></i>
                                    </h6>
                                    <p class="mb-0 tx-11 text-muted">1402/07/12</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix border-bottom p-3 ">
                        <div class="col mb-0">
                            <div class="d-flex">
                                <div class="avatar avatar-md bg-secondary-transparent rounded-circle">
                                    د
                                </div>
                                <div class="float-start mt-2 ms-2">
                                    <h6 class="mb-1">دینزلی</h6>
                                    <p class="mb-0 tx-13 text-muted">نقطه عطف</p>
                                </div>
                                <div class="ms-auto mt-2">
                                    <h6 class="mb-1 tx-15 font-weight-semibold ">
                                        2300000 ريال<i class="fas fa-level-down-alt ms-2 text-danger m-l-10"></i>
                                    </h6>
                                    <p class="mb-0 tx-11 text-muted">1402/02/05</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix border-bottom p-3 ">
                        <div class="col mb-0">
                            <div class="d-flex">
                                <div class="avatar avatar-md bg-info-transparent rounded-circle">
                                    د
                                </div>
                                <div class="float-start mt-2 ms-2">
                                    <h6 class="mb-1">دوزهاپلیکایشون وین</h6>
                                    <p class="mb-0 tx-13 text-muted">مجری فروش</p>
                                </div>
                                <div class="ms-auto mt-2">
                                    <h6 class="mb-1 tx-15 font-weight-semibold  ">
                                        7800000 ريال<i class="fas fa-level-down-alt ms-2 text-danger m-l-10"></i>
                                    </h6>
                                    <p class="mb-0 tx-11 text-muted">1402/01/03</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix border-bottom p-3 ">
                        <div class="col mb-0">
                            <div class="d-flex">
                                <div class="avatar avatar-md bg-danger-transparent rounded-circle">
                                    پ
                                </div>
                                <div class="float-start mt-2 ms-2">
                                    <h6 class="mb-1">پولی وانناکراکوئر</h6>
                                    <p class="mb-0 tx-13 text-muted">نقطه عطف 2</p>
                                </div>
                                <div class="ms-auto mt-2">
                                    <h6 class="mb-1 tx-15 font-weight-semibold  ">
                                        1200000 ريال<i class="fas fa-level-up-alt ms-2 text-success m-l-10"></i>
                                    </h6>
                                    <p class="mb-0 tx-11 text-muted">1402/01/19</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix  p-3 ">
                        <div class="col mb-0">
                            <div class="d-flex">
                                <div class="avatar avatar-md bg-warning-transparent rounded-circle">
                                    ب
                                </div>
                                <div class="float-start mt-2 ms-2">
                                    <h6 class="mb-1">با Staninterupshuns</h6>
                                    <p class="mb-0 tx-13 text-muted">بهبود برنامه</p>
                                </div>
                                <div class="ms-auto mt-2">
                                    <h6 class="mb-1 tx-15 font-weight-semibold ">
                                        2500000 ريال<i class="fas fa-level-down-alt ms-2 text-danger m-l-10"></i>
                                    </h6>
                                    <p class="mb-0 tx-11 text-muted">1402/03/25</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->

    <div class="row row-cards">
        <div class="col-md-12 col-lg-12 col-xl-3">
            <div class="card">
                <div>
                    <div class="weather-card one">
                        <div class="top">
                            <div class="wrapper">
                                <div class="mynav">
                                    <a href="javascript:void(0)"><span class="fe fe-chevron-left p-2"></span></a>
                                    <a href="javascript:void(0)"><span class="fe fe-settings p-2"></span></a>
                                </div>
                                <h2 class="text-white mt-4">امروز</h2>
                                <p class="temp mb-0">
                                    <span class='bx bx-cloud-light-rain tx-50 text-white'></span>
                                    <span class="temp-value">27</span>
                                    <span class="deg">0</span>
                                    <a href="javascript:void(0)"><span class="temp-type">C</span></a>
                                </p>
                                <p class=" tx-18 text-white mb-2">نیمه ابری</p>
                            </div>
                        </div>
                        <div class="bottom">
                            <a href="javascript:void(0);"><i class="fe fe-chevron-up uparrow"></i></a>
                            <div class="wrapper">
                                <ul class="forecast">
                                    <li class="active">
                                        <span class="date">آفتابی</span>
                                        <span class="fe fe-sun condition">
                                            <span class="temp">28<span class="deg">0</span><span class="temp-type">C</span></span>
                                        </span>
                                    </li>
                                    <li class="active">
                                        <span class="date">باد</span>
                                        <span class="fe fe-cloud condition">
                                            <span class="temp">73<span class="deg">0</span><span class="temp-type">C</span></span>
                                        </span>
                                    </li>
                                    <li class="active">
                                        <span class="date">باران</span>
                                        <span class="fe fe-cloud-rain condition">
                                            <span class="temp">32<span class="deg">0</span><span class="temp-type">C</span></span>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-xl-9">
            <div class="card ">
                <div class="card-header">
                    <h5 class="card-title">جدول فاکتور </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped card-table mt-0 mb-0 table-nowrap border"
                               id="datatable">
                            <thead>
                                <tr>
                                    <th>شناسه فاکتور</th>
                                    <th scope="row">نام مشتری</th>
                                    <th>شناسه مشتری</th>
                                    <th>تاریخ</th>
                                    <th>ارزش سفارش</th>
                                    <th>وضعیت</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a class="font-weight-normal1" href="javascript:void(0)">#002584611</a>
                                    </td>
                                    <td>جوآن پاول</td>
                                    <td>JoannePoole@gmail.com</td>
                                    <td>1401/11/13</td>
                                    <td>4500000 ريال</td>
                                    <td>
                                        <span class="badge bg-warning border-warning fs-11">انتظار</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="font-weight-normal1" href="javascript:void(0)">#004641215</a>
                                    </td>
                                    <td>گاوین گیبسون</td>
                                    <td>JoannePoole@gmail.com</td>
                                    <td>1401/11/13</td>
                                    <td>230000 ريال</td>
                                    <td>
                                        <span class="badge bg-danger border-danger fs-11">ناموفق</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="font-weight-normal1" href="javascript:void(0)">#004651234</a>
                                    </td>
                                    <td>سام جونیور</td>
                                    <td>JoannePoole@gmail.com</td>
                                    <td>1402/01/12</td>
                                    <td>430000 ريال</td>
                                    <td>
                                        <span class="badge bg-success border-success fs-11">پرداخت شده</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="font-weight-normal1" href="javascript:void(0)">#00434567</a>
                                    </td>
                                    <td>گابریل</td>
                                    <td>JoannePoole@gmail.com</td>
                                    <td>1401/11/13</td>
                                    <td>230000 ريال</td>
                                    <td>
                                        <span class="badge bg-warning border-warning fs-11">انتظار</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="font-weight-normal1" href="javascript:void(0)">#004345623</a>
                                    </td>
                                    <td>زک افرون</td>
                                    <td>JoannePoole@gmail.com</td>
                                    <td>1401/11/13</td>
                                    <td>5500000 ريال</td>
                                    <td>
                                        <span class="badge bg-success border-success fs-11">پرداخت شده</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="font-weight-normal1" href="javascript:void(0)">#004345234</a>
                                    </td>
                                    <td>مونا ماتی</td>
                                    <td>JoannePoole@gmail.com</td>
                                    <td>1401/11/13</td>
                                    <td>2340000 ريال</td>
                                    <td>
                                        <span class="badge bg-success border-success fs-11">پرداخت شده</span>
                                    </td>
                                </tr>
                                <tr class="border-bottom">
                                    <td>
                                        <a class="font-weight-normal1" href="javascript:void(0)">#004567455</a>
                                    </td>
                                    <td>سامانتا می</td>
                                    <td>JoannePoole@gmail.com</td>
                                    <td>1401/11/13</td>
                                    <td>4300000 ريال</td>
                                    <td>
                                        <span class="badge bg-warning border-warning fs-11">انتظار</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
</div>
@endsection
