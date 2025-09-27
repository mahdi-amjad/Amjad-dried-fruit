@extends('AdminAssets.layout.master')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title"> ویرایش دسته بندی</div>
            </div>
            <form action="{{route("Panel.Category.update", $category->id)}}" method="POST" enctype="multipart/form-data" id="my-form">
                @csrf
            <div class="card-body">
                <div class="pd-30 pd-sm-40 bg-gray-100">
                    <div class="row row-xs">
                        <div class="col-md-5">
                            <input class="form-control" name="name" placeholder="دسته بندی" type="text" value="{{$category->name}}">
                        </div>
                        <div class="col-md-5 mg-t-10 mg-md-t-0">
                            <input class="form-control" name="image" type="file">
                            <img src="{{asset('AdminAssets.Category-image/'. $category->image)}}" alt="" width="60px" style="margin-top: 10px">
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
