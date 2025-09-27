@extends('AdminAssets.layout.master')

@section('content')
<div class="col-xl-12">
    <div class="card mg-b-20">
        <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mg-b-2 mt-2">جدول اولیه</h4>
                <i class="mdi mdi-dots-horizontal text-gray"></i>
            </div>
            <p class="tx-12 text-muted mb-2">نمونه ای از میز حاشیه ادمینور.. <a href="#">بیشتر بدانید</a></p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-primary table-bordered mg-b-1 text-md-nowrap">
                    <thead>
                        <tr>
                            <th>شناسه</th>
                            <th>نام</th>
                            <th>کد محصول</th>
                            <th>تصویر</th>
                            <th>قیمت</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $index => $product)
                        <tr>
                            <th scope="row">{{$index + 1}}</th>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->product_code }}</td>
                            <td><span><img src="{{asset('AdminAssets.Product-image/'.$product->image)}}" width="60px" alt="avatar"></span></td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <a href="{{route('Panel.Product.Edit' , $product->id )}}" class="btn btn-success">ویرایش</a>
                                <a href="{{route('Panel.Product.Delete' , $product->id )}}" class="btn btn-danger">حذف</a>
                                <a href="{{route('Panel.Product.Createimage' , $product->id )}}" class="btn btn-primary">افزودن تصاویر</a>
                                <a href="{{route('Panel.Product.Gallery', $product->id )}}" class="btn btn-primary">گالری محصول</a>
                                <a href="{{route('Panel.Product.Productspecification', $product->id )}}" class="btn btn-primary">مشخصات محصول</a>

                            </td>
                      </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


