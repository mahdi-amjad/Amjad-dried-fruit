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
                <form action="{{route("Panel.Post.update",$postedits->id)}}" id="my-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row row-sm">
                        <div class="col-6">
                            <div class="form-group mg-b-0">
                                <label class="form-label">نام محصول : <span class="tx-danger">*</span></label>
                                <input class="form-control" name="name" value="{{$postedits->name}}" placeholder="نام محصول" required="" type="text">
                            </div>
                        </div>
                        <div class="col-12" style="margin-top: 15px">
                            <div class="form-group mg-b-0">
                                <div id="quillEditor" style="height: 300px;">
                                    {!!$postedits->content!!}
                                </div>
                                <!-- دکمه ارسال محتوا به textarea -->
                                <button type="button" id="sendToTextarea" class="btn btn-primary mt-2">ارسال محتوا به textarea</button>
                                <textarea name="content" id="content" style="display: none;" required>
                                    
                                </textarea>
                            </div>
                        </div>
                        <div class="col-12" style="margin-top: 15px">
                            <div class="form-group mg-b-0">
                                <label class="form-label">عکس محصول : <span class="tx-danger">*</span></label>
                                <input class="form-control" type="file" name="image"  required="">
                            <img src="{{asset('AdminAssets.Post-image/'. $postedits->image)}}" alt="" width="60px" style="margin-top: 10px">

                            </div>
                        </div>
                        <div class="col-12"><button class="btn btn-primary pd-x-20 mg-t-10" type="submit"> ثبت</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
const quill = new Quill('#quillEditor', {
    theme: 'snow',
    modules: {
        toolbar: [
            [{ 'align': [] }],
            ['bold', 'italic', 'underline', 'strike'],
            ['link', 'image'],
            [{ 'header': 1 }, { 'header': 2 }, { 'header': 3 }],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            ['blockquote'],
            [{ 'font': [] }]  // افزودن گزینه فونت
        ],
    }
});


// ارسال محتوای Quill به textarea
document.getElementById('sendToTextarea').addEventListener('click', () => {
    const content = document.querySelector('#content');
    content.value = quill.root.innerHTML;  // محتوای Quill را به textarea منتقل می‌کنیم
});

// آپلود تصویر
quill.getModule('toolbar').addHandler('image', () => {
    selectLocalImage();
});

function selectLocalImage() {
    const input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');
    input.click();

    input.onchange = async () => {
        const file = input.files[0];

        if (file) {
            const formData = new FormData();
            formData.append('image', file);

            const response = await fetch('{{ route('upload.image') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            });

            const data = await response.json();

            // فرض کنید که سرور URL کوتاه شده را در اختیار ما قرار می‌دهد
            const shortUrl = data.shortUrl;  // URL کوتاه شده‌ای که از سرور دریافت می‌کنیم
            const range = quill.getSelection();
            quill.insertEmbed(range.index, 'image', shortUrl);
        }
    };
}
  </script>

@endsection
@section('srcjs')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Admin\Categoryrequest', '#my-form') !!}
@endsection
