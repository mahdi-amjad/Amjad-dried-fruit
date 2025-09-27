@extends('AdminAssets.layout.master')

@section('content')
    <div class="main-content app-content">

        <!-- container -->
        <div class="main-container container-fluid">


            <!-- /breadcrumb -->
            <!-- main-content-body -->
            <div class="main-content-body">
                <div class="row row-sm">
                    <div class="col-xl-6 col-xxl-3 col-sm-12 col-lg-6 col-md-6">
                        <div class="card  widgets-cards bg-danger-gradient shadow-danger text-default border-0">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="chart-circle chart-circle-sm me-1" data-value="0.62" data-thickness="6"
                                        data-color="#b50d05"><canvas width="64" height="64"></canvas>
                                        <div class="chart-circle-value text-white">70%</div>
                                    </div>
                                    <div class="ms-2 mt-2">
                                        <h2 class="mb-0 tx-22">سفارشات</h2>
                                        <div class="">
                                            <span class="tx-12"><i class="fe fe-arrow-up-right"></i></span>
                                            <span class="tx-12">+73.59%</span>
                                        </div>
                                    </div>
                                    <h2 class="mt-3 ms-auto">8758</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-xxl-3 col-sm-12 col-lg-6 col-md-6">
                        <div class="card  widgets-cards bg-success-gradient shadow-success text-default border-0">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="chart-circle chart-circle-sm me-1" data-value="0.62" data-thickness="6"
                                        data-color="#2b9146"><canvas width="64" height="64"></canvas>
                                        <div class="chart-circle-value text-white">70%</div>
                                    </div>
                                    <div class="ms-2 mt-2">
                                        <h2 class="mb-0 tx-22">بازدیدها</h2>
                                        <div class="">
                                            <span class="tx-12"><i class="fe fe-arrow-down-right"></i></span>
                                            <span class="tx-12">-49.29%</span>
                                        </div>
                                    </div>
                                    <h2 class="mt-3 ms-auto">8758</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-xxl-3 col-sm-12 col-lg-6 col-md-6">
                        <div class="card  widgets-cards bg-secondary-gradient shadow-secondary text-default border-0">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="chart-circle chart-circle-sm me-1" data-value="0.62" data-thickness="6"
                                        data-color="#dd4829"><canvas width="64" height="64"></canvas>
                                        <div class="chart-circle-value text-white">70%</div>
                                    </div>
                                    <div class="ms-2 mt-2">
                                        <h2 class="mb-0 tx-22">درآمد</h2>
                                        <div class="">
                                            <span class="tx-12"><i class="fe fe-arrow-up-right"></i></span>
                                            <span class="tx-12">+86.29%</span>
                                        </div>
                                    </div>
                                    <h2 class="mt-3 ms-auto">8758</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-xxl-3 col-sm-12 col-lg-6 col-md-6">
                        <div class="card  widgets-cards bg-info-gradient shadow-info text-default border-0">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="chart-circle chart-circle-sm me-1" data-value="0.62" data-thickness="6"
                                        data-color="#3578d5"><canvas width="64" height="64"></canvas>
                                        <div class="chart-circle-value text-white">70%</div>
                                    </div>
                                    <div class="ms-2 mt-2">
                                        <h2 class="mb-0 tx-22">نظرات</h2>
                                        <div class="">
                                            <span class="tx-12"><i class="fe fe-arrow-down-right"></i></span>
                                            <span class="tx-12">-33.29%</span>
                                        </div>
                                    </div>
                                    <h2 class="mt-3 ms-auto">8758</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8 col-lg-12 col-md-12 ">
                        <div class="card overflow-hidden">
                            <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
                                <h5 class="card-title">رشد فروش</h5>
                            </div>
                            <div class="card-body pd-y-7">
                                <div id="growthcompany"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4  col-lg-12 col-md-12 ">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h5 class="card-title">آمار سفارش</h5>
                            </div>
                            <div class="card-body">
                                <div id="chart-company" class="chartsh"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-header border-bottom-0">
                                <h3 class="card-title">کشورهای برتر</h3>
                            </div>
                            <div class="">
                                <table class="table card-table mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="wd-5"><i class="flag-lg flag-us "></i></td>
                                            <td class=" px-0">
                                                ایالات متحده آمریکا
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-primary" style="width: 78%"></div>
                                                </div>
                                            </td>
                                            <td class="wd-5 text-end"><span class="tx-18">25,000ريال</span></td>
                                        </tr>
                                        <tr>
                                            <td class="wd-5"><i class="flag-lg flag-pl "></i></td>
                                            <td class=" px-0">
                                                لهستان
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-secondary" style="width: 62%"></div>
                                                </div>
                                            </td>
                                            <td class="wd-5 text-end"><span class="tx-18">34,000ريال</span></td>
                                        </tr>
                                        <tr>
                                            <td class="wd-5"><i class="flag-lg flag-ru "></i></td>
                                            <td class=" px-0">
                                                روسیه
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-success" style="width: 42%"></div>
                                                </div>
                                            </td>
                                            <td class="wd-5 text-end"><span class="tx-18">57,000ريال</span></td>
                                        </tr>
                                        <tr>
                                            <td class="wd-5"><i class="flag-lg flag-in"></i></td>
                                            <td class=" px-0">
                                                هندوستان
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-info" style="width: 77%"></div>
                                                </div>
                                            </td>
                                            <td class="wd-5 text-end"><span class="tx-18">72,000ريال</span></td>
                                        </tr>
                                        <tr>
                                            <td class="wd-5"><i class="flag-lg flag-pk "></i></td>
                                            <td class=" px-0">
                                                پاکستان
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-danger" style="width: 77%"></div>
                                                </div>
                                            </td>
                                            <td class="wd-5 text-end"><span class="tx-18">62,000ريال</span></td>
                                        </tr>
                                        <tr>
                                            <td class="wd-5"><i class="flag-lg flag-de "></i></td>
                                            <td class=" px-0">
                                                آلمان
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-warning" style="width: 62%"></div>
                                                </div>
                                            </td>
                                            <td class="wd-5 text-end"><span class="tx-18">47,000ريال</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">مشتریان برتر</h2>
                            </div>
                            <div class="card-body">
                                <div class="media event mb-2">
                                    <a class="pull-left message-avatar mb-1 ">
                                        <img src="assets/img/users/16.jpg" alt="" class="rounded-circle me-3">
                                    </a>
                                    <div class="media-body d-flex">
                                        <div class="pull-left">
                                            <h5 class="title mb-0">علیرضا کرمی</h5>
                                            <p class="text-muted tx-14">بنگلادش</p>
                                        </div>
                                        <div class="pull-right ms-auto tx-14">
                                            <p class="tx-16">290,526,0020 ريال</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="media event mb-2">
                                    <a class="pull-left message-avatar mb-1 ">
                                        <img src="assets/img/users/15.jpg" alt="" class="rounded-circle me-3">
                                    </a>
                                    <div class="media-body d-flex">
                                        <div class="pull-left">
                                            <h5 class="title mb-0">سینا خیرالهی</h5>
                                            <p class="text-muted tx-14">با ایمیل</p>
                                        </div>
                                        <div class="pull-right ms-auto tx-14">
                                            <p class="tx-16">290,720,112 ريال</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="media event mb-2">
                                    <a class="pull-left message-avatar mb-1 ">
                                        <img src="assets/img/users/14.jpg" alt="" class="rounded-circle me-3">
                                    </a>
                                    <div class="media-body d-flex">
                                        <div class="pull-left">
                                            <h5 class="title mb-0">مهدی امجد</h5>
                                            <p class="text-muted tx-14">فرانسه</p>
                                        </div>
                                        <div class="pull-right ms-auto tx-14">
                                            <p class="tx-16">280,154,010 ريال</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="media event mb-2">
                                    <a class="pull-left message-avatar mb-1 ">
                                        <img src="assets/img/users/13.jpg" alt="" class="rounded-circle me-3">
                                    </a>
                                    <div class="media-body d-flex">
                                        <div class="pull-left">
                                            <h5 class="title mb-0">نیما احمدزاده</h5>
                                            <p class="text-muted tx-14">آلمان</p>
                                        </div>
                                        <div class="pull-right ms-auto tx-14">
                                            <p class="tx-16">270,456,214 ريال</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="media event mb-2">
                                    <a class="pull-left message-avatar mb-1 ">
                                        <img src="assets/img/users/12.jpg" alt="" class="rounded-circle me-3">
                                    </a>
                                    <div class="media-body d-flex">
                                        <div class="pull-left">
                                            <h5 class="title mb-0">حجت</h5>
                                            <p class="text-muted tx-14">استرالیا</p>
                                        </div>
                                        <div class="pull-right ms-auto tx-14">
                                            <p class=" tx-16">260,861,759 ريال</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="media event mb-2">
                                    <a class="pull-left message-avatar mb-1 ">
                                        <img src="assets/img/users/11.jpg" alt="" class="rounded-circle me-3">
                                    </a>
                                    <div class="media-body d-flex">
                                        <div class="pull-left">
                                            <h5 class="title mb-0">محمد طائی</h5>
                                            <p class="text-muted tx-14 mb-0">بلژیک</p>
                                        </div>
                                        <div class="pull-right ms-auto tx-14">
                                            <p class="tx-16 mb-0"> 250,020,910 ريال </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-header border-bottom-0">
                                <h3 class="card-title">تاریخچه فروش</h3>
                            </div>
                            <div class="border-0">
                                <table class="table mb-0 card-table table-vcenter text-nowrap">
                                    <tbody>
                                        <tr>
                                            <td class="no-border">فروش کل</td>
                                            <td class="no-border text-end"><span class="btn btn-primary btn-sm">55000
                                                    ریال</span></td>
                                        </tr>
                                        <tr>
                                            <td>سود کل</td>
                                            <td class="text-end"><span class="btn btn-success btn-sm">12,000 ریال</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>کل مشتریان</td>
                                            <td class="text-end"><span class="btn btn-secondary btn-sm">40,000 ریال</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>کل سفارشات</td>
                                            <td class="text-end"><span class="btn btn-primary btn-sm">50,000 ریال</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>همه نظرات</td>
                                            <td class="text-end"><span class="btn btn-success btn-sm">35,000 ریال</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>درآمد کل</td>
                                            <td class="text-end"><span class="btn btn-secondary btn-sm">45,000 ریال</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>هزینه کل</td>
                                            <td class="text-end"><span class="btn btn-info btn-sm">30,000 ریال</span></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 ">
                        <div class="card">
                            <div class="card-body text-center profile p-0">
                                <div class="image">
                                    <img src="assets/img/media/11.jpg" alt="" class="profile-img">
                                    <div class="box img-absolute">
                                        <div class="img-1">
                                            <img src="assets/img/users/1.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-6 box">
                                    <div class="p-4">
                                        <h2 class="mt-5">فاطمه غفاری<br><span class="mt-2 mb-0 badge bg-primary">طراح
                                                وب</span></h2>
                                        <p class=" mt-0">
                                            ...من فاطمه غفاری هستم.برنامه نویس و طراح وب
                                        </p>
                                        <div class="text-center">
                                            <ul class="d-flex justify-content-center">
                                                <li><a href="javascript:void(0);"><i class="bx bxl-facebook text-primary"
                                                            aria-hidden="true"></i></a></li>
                                                <li><a href="javascript:void(0);"><i class="bx bxl-twitter text-primary"
                                                            aria-hidden="true"></i></a></li>
                                                <li><a href="javascript:void(0);"><i class="bx bxl-google  text-primary"
                                                            aria-hidden="true"></i></a></li>
                                                <li><a href="javascript:void(0);"><i class="bx bxl-linkedin  text-primary"
                                                            aria-hidden="true"></i></a></li>
                                                <li><a href="javascript:void(0);"><i class="bx bxl-instagram text-primary"
                                                            aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card custom-card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title tx-18"><label class="main-content-label tx-15">سفارشات عمده
                                        محصولات</label></h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-nowrap border-bottom mb-0  border"
                                        id="recentorders">
                                        <thead>
                                            <tr>
                                                <th class="wd-lg-10p">مشتری</th>
                                                <th class="wd-lg-10p">شماره تلفن</th>
                                                <th class="wd-lg-10p">تاریخ</th>
                                                <th class="wd-lg-10p"> کد محصول</th>
                                                <th class="wd-lg-10p"> توضیحات کوتاه</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($WholesaleInquirys as $WholesaleInquiry)
                                                <tr>
                                                    <td class="font-weight-normal d-flex  border-0">
                                                        <div class="avatar bg-info-transparent text-info rounded-circle">
                                                            {{ substr($WholesaleInquiry->name, 0, 1) }}
                                                        </div>
                                                        <span class="mt-2 ms-2"> {{ $WholesaleInquiry->name }} </span>
                                                    </td>
                                                    <td class="font-weight-normal">{{ $WholesaleInquiry->phone }}</td>
                                                    <td class=" text-muted tx-13">{{ $WholesaleInquiry->created_at_jalali }}</td>
                                                    <td class="text-muted tx-13">
                                                        {{ $WholesaleInquiry->product ? $WholesaleInquiry->product->product_code : '—' }}
                                                    </td>
                                                    <td class=" text-muted tx-13">{{ $WholesaleInquiry->message }}</td>


                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row -->


        </div>
        <!-- Container closed -->
    </div>
@endsection
