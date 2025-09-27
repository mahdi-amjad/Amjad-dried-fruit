@extends('AdminAssets.layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Required Input Validation</div>
                    <p class="mb-0 text-muted tx-13">سفارشی کردن آن بسیار آسان است و در برنامه وب سایت شما استفاده می شود.
                    </p>
                </div>
                <div class="card-body">
                    <form action="{{ route('discounts.store') }}" id="my-form" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm">
                            <div class="col-6">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">نام تخفیف : <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="title" placeholder="نام تخفیف" required=""
                                        type="text">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group mg-b-0">
                                    <label class="form-label"> نوع تخفیف: <span class="tx-danger">*</span></label>
                                    <select name="type" class="form-control SlectBox"
                                        onclick="console.log($(this).val())" onchange="console.log('change is firing')">
                                        <option value="fixed">مبلغ ثابت</option>
                                        <option value="percent">درصدی</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12" style="margin-top: 15px">
                                <div class="form-group mg-b-0">
                                    <label class="form-label"> مقدار تخفیف : <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="value" required="">
                                </div>
                            </div>


                            <div class="col-6">
                                <div class="form-group mg-t-15">
                                    <label class="form-label">   بر اساس محصول: <span class="tx-danger">*</span></label>
                                    <select name="product_id" class="form-control SlectBox"
                                        onclick="console.log($(this).val())" onchange="console.log('change is firing')">
                                        <option value="">انتخاب نکن </option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mg-t-15">
                                    <label class="form-label">  بر اساس دسته بندی: <span class="tx-danger">*</span></label>
                                    <select name="category_id" class="form-control SlectBox"
                                        onclick="console.log($(this).val())" onchange="console.log('change is firing')">
                                        <option value="">انتخاب نکن </option>
                                        @foreach ($categorys as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12"><button class="btn btn-primary pd-x-20 mg-t-10" type="submit"> ثبت</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('srcjs')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\Categoryrequest', '#my-form') !!}
@endsection
