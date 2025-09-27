@extends('AdminAssets.layout.master')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title"> ویرایش  پاصفحه</div>
            </div>
            <div class="card-body">
            <form action="{{route('panel.footer.update', $footer->id)}}" method="POST" enctype="multipart/form-data" id="my-form">
                @csrf
              <div class="row row-sm">
                        <div class="col-6">
                            <div class="form-group mg-b-0">
                                <label class="form-label"> ایمیل : <span class="tx-danger">*</span></label>
                                <input class="form-control" name="email" value="{{$footer->email}}" placeholder="ایمیل" required="" type="text">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label"> شماره تلفن : <span class="tx-danger">*</span></label>
                                <input class="form-control" name="phone" value="{{$footer->phone}}" placeholder=" شماره تلفن" required="" type="text">
                            </div>
                        </div>
                       <div class="col-12">
                            <div class="form-group">
                                <label class="form-label">  آدرس : <span class="tx-danger">*</span></label>
                                <input class="form-control" name="address" value="{{$footer->address}}" placeholder="  آدرس" required="" type="text">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label">  لینک اینستاگرام : <span class="tx-danger">*</span></label>
                                <input class="form-control" name="instagram" value="{{$footer->instagram}}" placeholder="لینک اینستاگرام " required="" type="text">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label">  لینک تلگرام  : <span class="tx-danger">*</span></label>
                                <input class="form-control" name="telegram" value="{{$footer->telegram}}" placeholder="  لینک تلگرام " required="" type="text">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label">  لینک واتساپ  : <span class="tx-danger">*</span></label>
                                <input class="form-control" name="whatsapp" value="{{$footer->whatsapp}}" placeholder="  لینک واتساپ " required="" type="text">
                            </div>
                        </div>
                           <div class="col-12">
                            <div class="form-group">
                                <label class="form-label">کپی رایت : <span class="tx-danger">*</span></label>
                                <input class="form-control" name="copyright" value="{{$footer->copyright}}" placeholder="کپی رایت" required="" type="text">
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
