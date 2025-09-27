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
                            <th>ایمیل</th>
                            <th>شماره تلفن</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $footer->email }}</td>
                            <td>{{ $footer->phone }}</td>
                            <td>
                                <a href="{{route('panel.footer.update' , $footer->id )}}" class="btn btn-success">ویرایش</a>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


