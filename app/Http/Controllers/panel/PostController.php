<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;


class PostController extends Controller
{

    public function Create()
    {
        return view('AdminAssets.Post.createpost');
    }
    public function Storepost(Request $request)
    {
        if ($request->hasFile('image')) {
            $imageform = time() . '.' . $request->image->extension();
            $request->image->move(public_path('AdminAssets.Post-image'), $imageform);
            $dateform = $request->all();
            $dateform['image'] = $imageform;

            Post::create($dateform);
            Alert::success('موفقیت', 'مقاله با موفقیت ثبت شد');
            return redirect('panel/post/posts');
        }
    }
    public function update(Request $request, $id)
    {
        $product = Post::findOrFail($id);

        // گرفتن همه فیلدها به جز عکس
        $data = $request->except('image');

        if ($request->hasFile('image')) {
            // آپلود تصویر جدید
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('AdminAssets.Post-image'), $imageName);

            // حذف تصویر قدیمی
            $oldImage = public_path("AdminAssets.Post-image/" . $product->image);
            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }

            // جایگزینی تصویر جدید در آرایه داده‌ها
            $data['image'] = $imageName;
        }

        // آپدیت محصول (با یا بدون تصویر)
        $product->update($data);

        Alert::success('موفقیت', 'محصول با موفقیت ویرایش شد');
        return redirect('panel/post/posts');
    }


    public function posts()
    {
        $posts = Post::all();
        return view('AdminAssets.Post.posts', compact('posts'));
    }
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();

            // ذخیره تصویر
            $image->move(public_path('AdminAssets.Post-image'), $imageName);

            // ساختن URL کوتاه برای تصویر
            $shortUrl = asset('AdminAssets.Post-image/' . $imageName); // برای سادگی، از مسیر تصویر به‌عنوان URL کوتاه استفاده می‌کنیم

            // ارسال URL کوتاه به فرانت‌اند
            return response()->json([
                'shortUrl' => $shortUrl
            ]);
        }
        return response()->json(['error' => 'No image uploaded'], 400);
    }

    public function Edit($id)
    {
        $postedits = Post::find($id);
        return view('AdminAssets.Post.editpost', compact('postedits'));
    }

    public function Delete($id)
    {
        $products = Post::find($id);
        $pictrue = "AdminAssets.Product-image/" . $products->image;
        if (File::exists($pictrue)) {
            File::delete($pictrue);
        }
        $products->delete();
        Alert::success('موفقیت', 'مقاله  با موفقیت حذف شد');
        return redirect('panel/post/posts');
    }
}
