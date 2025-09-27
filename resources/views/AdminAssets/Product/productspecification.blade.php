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
                <form action="{{route("Panel.Product.Specification",$id)}}" id="my-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="specifications">
                        <div class="row row-sm specification-template">
                            <div class="col-6" style="margin-top: 15px">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">نام مشخصه :<span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="specifications[0][name]" placeholder="نام مشخصه" required="">
                                </div>
                            </div>
                            <div class="col-6" style="margin-top: 15px">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">مقدار مشخصه : <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="specifications[0][value]" placeholder="مقدار مشخصه" required="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary pd-x-20 mg-t-10" type="button" id="addSpecification">افزودن مشخصه</button>
                        <button class="btn btn-primary pd-x-20 mg-t-10" type="submit">ثبت</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-12">
    <div class="card mg-b-20">
        <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mg-b-2 mt-2">لیست مشخصات محصول</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-primary table-bordered mg-b-1 text-md-nowrap">
                    <thead>
                        <tr>
                            <th>شناسه</th>
                            <th>نام مشخصه</th>
                            <th>مقدار مشخصه</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($specifications as $index => $spec)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $spec->name }}</td>
                            <td>{{ $spec->value }}</td>
                            <td>
                                <a href="{{route('Panel.Product.DeleteSpecification', $spec->id)}}" class="btn btn-danger btn-sm">حذف</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    let count = {{ count($specifications) }};
    document.getElementById('addSpecification').addEventListener('click', function (e) {
        e.preventDefault();
        const specifications = document.getElementById('specifications');
        const template = document.querySelector('.specification-template');
        const clone = template.cloneNode(true);

        const inputs = clone.querySelectorAll('input');
        inputs.forEach(input => {
            const fieldName = input.getAttribute('name');
            if (fieldName) {
                input.setAttribute('name', fieldName.replace('[0]', `[${count}]`));
                input.value = '';
            }
        });

        specifications.appendChild(clone);
        count++;
    });
</script>
@endsection

@section('srcjs')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Admin\Categoryrequest', '#my-form') !!}
@endsection
