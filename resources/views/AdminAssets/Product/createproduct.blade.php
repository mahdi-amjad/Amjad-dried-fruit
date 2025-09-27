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
                    <form action="{{ route('Panel.Product.storeproduct') }}" id="my-form" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm">
                            <div class="col-6">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">نام محصول : <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="name" placeholder="نام محصول" required=""
                                        type="text">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">قیمت محصول : <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="price" placeholder="قیمت محصول" required=""
                                        type="text">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">دسته بندی محصول: <span class="tx-danger">*</span></label>
                                    <select name="Id_category" class="form-control SlectBox"
                                        onclick="console.log($(this).val())" onchange="console.log('change is firing')">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12" style="margin-top: 15px">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">توضیحات محصول : <span class="tx-danger">*</span></label>
                                    <textarea id="editor1" name="description"></textarea>
                                </div>
                            </div>
                            <div class="col-12" style="margin-top: 15px">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">عکس محصول : <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="file" name="image" required="">
                                </div>
                            </div>
                            <div class="col-12" style="margin-top: 15px">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">توضیحات محصول : <span class="tx-danger">*</span></label>
                                    <textarea name="caption" id="editor2"></textarea> <!-- اینجا محتوای ویرایشگر ارسال می‌شود -->
                                </div>
                            </div>


                            <div class="col-12" style="margin-top: 15px">
                                <div class="form-group mg-b-0">
                                    <div class="col-lg-3">
                                        <label class="ckbox"><input type="checkbox" name="is_special_offer"
                                                id="is_special_offer" value="1"><span>شگفت انگیز</span></label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12" style="margin-top: 15px">
                                <div class="form-group mg-b-0">
                                    <div class="col-lg-3">
                                        <label class="ckbox"><input type="checkbox" name="is_suggested" id="is_suggested"
                                                value="1"><span> محصول پیشنهادی</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12" style="margin-top: 15px">
                                <div class="form-group mg-b-0">
                                    <div class="col-lg-3">
                                        <label class="ckbox"><input type="checkbox" name="is_wholesale" id="is_wholesale"
                                                value="1"><span> محصول عمده</span></label>
                                    </div>
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
    <script>
        ClassicEditor
            .create(document.querySelector('#editor1'), {
                toolbar: [
                    'bold',
                    'italic',
                    'link',
                    'bulletedList', // افزودن لیست‌های غیر مرتب
                    'numberedList', // افزودن لیست‌های مرتب
                    'undo',
                    'redo',
                    'blockQuote', // افزودن نقل‌قول
                    'insertTable', // افزودن جدول
                    'imageUpload', // افزودن تصویر
                ],
                language: 'fa', // زبان فارسی
                directionality: 'rtl', // راستچین کردن
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor2'), {
                toolbar: [
                    'bold',
                    'italic',
                    'link',
                    'bulletedList', // افزودن لیست‌های غیر مرتب
                    'numberedList', // افزودن لیست‌های مرتب
                    'undo',
                    'redo',
                    'blockQuote', // افزودن نقل‌قول
                    'insertTable', // افزودن جدول
                    'imageUpload', // افزودن تصویر
                ],
                language: 'fa', // زبان فارسی
                directionality: 'rtl', // راستچین کردن
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
@section('srcjs')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\Categoryrequest', '#my-form') !!}
@endsection
