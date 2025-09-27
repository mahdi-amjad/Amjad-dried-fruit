@extends('AdminAssets.layout.master')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Required Input Validation</div>
                <p class="mb-0 text-muted tx-13">سفارشی کردن آن بسیار آسان است و در برنامه وب سایت شما استفاده می شود.</p>
            </div>
            <div class="card-body">
                <form action="{{route("Panel.Product.Storeimage",$id)}}" id="my-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row row-sm">
                        <div class="col-12" style="margin-top: 15px">
                            <div class="form-group mg-b-0">
                                <label class="form-label">گالری تصاویر: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="file" name="image"  required="">
                            </div>
                        </div>
                        <div class="col-12"><button class="btn btn-primary pd-x-20 mg-t-10" type="submit"> ثبت</button></div>
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
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Admin\Categoryrequest', '#my-form') !!}
@endsection
