<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Product;
use App\Models\Productspecification;
use App\Models\productimages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function create()
    {
        $categories = category::all();
        return view('AdminAssets.Product.createProduct', compact('categories'));
    }
    public function storeproduct(Request $request)
    {
        if ($request->hasFile('image')) {
            $imageform = time() . '.' . $request->image->extension();
            $request->image->move(public_path('AdminAssets.Product-image'), $imageform);
            $dateform = $request->all();
            $dateform['image'] = $imageform;
            $dateform['is_special_offer'] = $request->has('is_special_offer') ? true : false;

            Product::create($dateform);
            Alert::success('موفقیت', 'محصول با موفقیت ثبت شد');
            return redirect('panel/product/products');
        }
    }

    public function products()
    {
        $products = Product::with('category')->get(); // بارگذاری محصولات به همراه دسته‌بندی‌ها
        return view('AdminAssets.Product.products', compact('products'));
    }

    public function Edit($id)
    {
        $products = Product::find($id);
        $categories = Category::all();
        if (!$products) {
            return redirect()->route('products.index')->with('error', 'محصول یافت نشد!');
        } {
            return view('AdminAssets.Product.Edit',  compact('products', 'categories'));
        }
    }


  public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    // گرفتن همه داده‌ها به جز تصویر
    $data = $request->except('image');

    if ($request->hasFile('image')) {
        // آپلود تصویر جدید
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('AdminAssets.Product-image'), $imageName);

        // حذف تصویر قدیمی
        $oldImage = public_path("AdminAssets.Product-image/" . $product->image);
        if (File::exists($oldImage)) {
            File::delete($oldImage);
        }

        // قرار دادن نام تصویر جدید در آرایه داده‌ها
        $data['image'] = $imageName;
    }

    // آپدیت محصول با یا بدون تصویر
    $product->update($data);

    Alert::success('موفقیت', 'محصول با موفقیت ویرایش شد');
    return redirect('panel/product/products');
}


    public function Delete($id)
    {
        $products = Product::find($id);
        $pictrue = "AdminAssets.Product-image/" . $products->image;
        if (File::exists($pictrue)) {
            File::delete($pictrue);
        }
        $products->delete();
        Alert::success('موفقیت', 'محصول  با موفقیت حذف شد');
        return redirect('panel/product/products');
    }

    public function Createimage($id)
    {
        return view('AdminAssets.Product.createimage', compact('id'));
    }

    public function storeimage($id, Request $request)
    {
        if ($request->hasFile('image')) {
            $imageform = time() . '.' . $request->image->extension();
            $request->image->move(public_path('AdminAssets.Product-image'), $imageform);
            $dateform['image'] = $imageform;
            $dateform['Id_productimage'] = $id;

            productimages::create($dateform);


            Alert::success('موفقیت', 'تصویر با موفقیت ثبت شد');
            return redirect('panel/product/products');
        }
    }

    public function Gallery($id)
    {
        $products = Product::find($id);
        $Gallerys = productimages::all();
        return view('AdminAssets.Product.Gallery', compact('Gallerys', 'products'));
    }

    public function Deletegallery($id)
    {
        $images = productimages::find($id);
        $pictrue = "AdminAssets.Product-image/" . $images->images;
        if (File::exists($pictrue)) {
            File::delete($pictrue);
        }
        $images->delete();
        Alert::success('موفقیت', ' گالری محصول با موفقیت حذف شد');
        return redirect('panel/product/products');
    }

    public function productspecification($id)
    {
        $product = Product::find($id);

        // بازیابی مشخصات محصول
        $specifications = $product->specifications;

        // بازگشت به ویو به همراه مشخصات
        return view('AdminAssets.Product.productspecification', compact('specifications', 'id'))
            ->with('success', 'مشخصه‌ها با موفقیت ثبت شدند.');
    }

    public function Specification($id, Request $request)
    {


        $product = Product::findOrFail($id);

        // بررسی و ذخیره مشخصات
        foreach ($request->specifications as $specification) {
            $product->specifications()->create([
                'name' => $specification['name'],
                'value' => $specification['value'],
            ]);
        }

        return redirect()->back()->with('success', 'مشخصه‌ها با موفقیت ثبت شدند.');
    }

    public function DeleteSpecification($id)
    {
        $specification = Productspecification::findOrFail($id);

        $specification->delete();

        return redirect()->back()->with('success', 'مشخصه با موفقیت حذف شد.');
    }


   
}
