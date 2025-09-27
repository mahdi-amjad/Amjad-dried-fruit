@extends('AdminAssets.layout.master')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title"> اضافه کردن اسلایدر</div>
                <p class="mb-0 text-muted tx-13">.سفارشی سازی و استفاده از آن در برنامه وب سایت خود بسیار آسان است</p>
            </div>
            <form action="{{ route('Panel.Slider.Storeslider') }}" method="POST" enctype="multipart/form-data" id="my-form">
                @csrf
            <div class="card-body">
                <div class="pd-30 pd-sm-40 bg-gray-100">
                    <div class="row row-xs">
                        <div class="col-md-5">
                            <input class="form-control" name="url" placeholder="لینک اسلایدر" type="text">
                        </div>
                        <div class="col-md-5 mg-t-10 mg-md-t-0">
                            <input class="form-control" name="image" placeholder="عکس اسلایدر" type="file">
                        </div>
                        <div class="col-md mg-t-10 mg-md-t-0">
                            <button type="submit" class="btn btn-primary btn-block">ثبت</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('srcjs')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Admin\Categoryrequest', '#my-form') !!}
@endsection
