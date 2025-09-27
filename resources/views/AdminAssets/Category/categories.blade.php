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
                            <th>تاریخ ثبت</th>
                            <th>تصویر</th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $index => $category)
                        <tr>
                            <th scope="row">{{$index + 1}}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at_jalali }}</td>
                            <td><span><img src="{{asset('AdminAssets.Category-image/'.$category->image)}}" width="60px" alt="avatar"></span></td>
                            <td>@if ( $category->status==0)
                                 تایید نشده
                                @else
                                 تاییده شده
                                @endif
                             </td>
                            <td>
                                <a href="{{route('Panel.Category.Edit' , $category->id )}}" class="btn btn-success">ویرایش</a>
                                <a href="{{route('Panel.Category.Delete' , $category->id )}}" class="btn btn-danger">حذف</a>
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


