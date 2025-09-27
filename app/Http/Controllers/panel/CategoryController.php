<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
class CategoryController extends Controller
{

    public function create()
    {
        return view('AdminAssets.Category.createcategory');
    }

    public function createpost(Request $request)
    {
        if ($request->hasFile('image')) {
            $imageform = time() . '.' . $request->image->extension();
            $request->image->move(public_path('AdminAssets.Category-image'), $imageform);
            $dateform = $request->all();
            $dateform['image'] = $imageform;

            category::create($dateform);
            Alert::success('موفقیت', 'دسته بندی با موفقیت ثبت شد');
            return redirect('panel/category/categories');


        }
    }

    public function categories()
    {
        $categories = category::all();

        return view('AdminAssets.Category.categories', compact('categories'));
    }

    public function Edit($id)
    {
        $category = category::find($id);

        return view('AdminAssets.Category.Edit', compact('category'));
    }


   public function update(Request $request, $id)
{
    $category = Category::findOrFail($id);

    // گرفتن همه داده‌ها
    $dataForm = $request->all();

    if ($request->hasFile('image')) {
        // ذخیره عکس جدید
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('AdminAssets.Category-image'), $imageName);

        // قرار دادن نام عکس در آرایه داده‌ها
        $dataForm['image'] = $imageName;

        // حذف عکس قبلی
        $oldPicture = public_path("AdminAssets.Category-image/" . $category->image);
        if (File::exists($oldPicture)) {
            File::delete($oldPicture);
        }
    } else {
        // اگر عکس جدید آپلود نشد، مقدار image رو حذف می‌کنیم تا قبلی تغییر نکنه
        unset($dataForm['image']);
    }

    // آپدیت دسته‌بندی
    $category->update($dataForm);

    Alert::success('موفقیت', 'دسته بندی با موفقیت ویرایش شد');
    return redirect('panel/category/categories');
}


    public function Delete($id)
    {
        $category = Category::find($id);
        $pictrue = "AdminAssets.Category-image/" . $category->image;
        if (File::exists($pictrue)) {
            File::delete($pictrue);
        }
        $category->delete();
        Alert::success('موفقیت', 'دسته بندی با موفقیت حذف شد');
        return redirect('panel/category/categories');
    }
}
