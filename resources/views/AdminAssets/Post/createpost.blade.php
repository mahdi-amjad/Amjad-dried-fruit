@extends('AdminAssets.layout.master')
@section('content')
<div class="main-container container-fluid">

    <div class="row">
        <div class="col-lg-12 col-md-12 col-md-12">
            <form action="{{route('Panel.Post.Storepost')}}" method="POST" enctype="multipart/form-data" id="postForm">
                @csrf
                <div class="card blog-edit">
                    <div class="card-header">
                        <div class="card-title">ویرایش پست</div>
                    </div>
                    <div class="card-body">
                        <!-- عنوان مقاله -->
                        <div class="form-group">
                            <label class="form-label text-dark">عنوان مقاله</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
            
                        <!-- محتوای مقاله -->
                        <div class="form-group">
                            <label for="content">محتوا</label>
                            <div id="quillEditor" style="height: 300px;"></div>
                            <!-- دکمه ارسال محتوا به textarea -->
                            <button type="button" id="sendToTextarea" class="btn btn-primary mt-2">ارسال محتوا به textarea</button>
                            <textarea  name="content" id="content" style="display: none;font-family: 'Vazir', Tahoma, Arial, sans-serif; font-size:16px;" required></textarea>
                        </div>
            
                        <!-- آپلود تصویر -->
                        <div class="p-4 border mb-4 form-group rounded">
                            <label class="form-label text-dark">انتخاب تصویر</label>
                            <input id="demo" type="file" name="image" accept="image/jpeg, image/png" required>
                        </div>
                    </div>
            
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="submitBtn">ذخیره</button>
                    </div>
                </div>
            </form>
            
            
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

