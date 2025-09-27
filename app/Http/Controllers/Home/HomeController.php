<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Khoshkbar\ContactRequest as KhoshkbarContactRequest;
use App\Models\category;
use App\Models\Contact;
use App\Models\Footer;
use App\Models\Offers;
use App\Models\Post;
use App\Models\Product;
use App\Models\productimages;
use App\Models\Slider;
use App\Models\slidertwo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $productnews = Product::all()->first()->where('is_wholesale', false)->take(8)->get();
        $posts = Post::all()->first()->take(8)->get();
        $productspecials = Product::where('is_special_offer', 1)->where('is_wholesale', false)->take(8)->get();
        $productsuggesteds = Product::where('is_suggested', 1)->where('is_wholesale', false)->take(8)->get();
        $sliders = Slider::all();
        $slidertwos = slidertwo::all();
        $categories = category::all();
        $offerlists = Offers::all();
        return view('khoshkbar.Home.index', compact('productnews','offerlists', 'sliders', 'categories', 'slidertwos', 'productspecials', 'productsuggesteds', 'posts'));
    }


    public function product($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'محصول پیدا نشد.');
        }
        $productimages = productimages::all();
        $specifications = $product->specifications;
        $relatedproduct = Product::where("Id_category", $product->Id_category)
            ->where('id', '!=', $product->Id_category)->take(8)->get();

        $discount = $product->discounts()
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->first();
        $reviews = $product->reviews;
        return view('khoshkbar.Home.product-slingle-page', compact('product', 'reviews', 'discount', 'productimages', 'specifications', 'relatedproduct'));
    }

    public function wholesale()
    {
        $products = Product::where('is_wholesale', true)->paginate(12);
        return view('khoshkbar.Wholesale.wholesale', compact('products'));
    }
    public function post($id)
    {
        $posts = Post::find($id);
        $lastedpost = Post::latest()->take(8)->get();
        return view('khoshkbar.Home.post', compact('posts', 'lastedpost'));
    }
    public function allpost()
    {
        $allposts = Post::all();
        return view('khoshkbar.Home.all_post', compact('allposts'));
    }
    public function contact()
    {
        return view('khoshkbar.Home.contact');
    }

    public function Contactpost(KhoshkbarContactRequest $request)
    {

        Contact::create([
            'username'    => $request->username,
            'email'   => $request->email,
            'title'   => $request->title,
            'content' => $request->content,
        ]);

        return back()->with('success', 'پیام شما با موفقیت ثبت شد ✅');
    }

    public function All_product(Request $request)
    {
        // دریافت مقدار sort از درخواست یا استفاده از مقدار پیش‌فرض 'newest'
        $sort = $request->get('sort', 'newest');
        $search = $request->get('search', '');
        $query = Product::query()->where('is_wholesale', false);

        if (!empty($search)) {
            $query->where('name', 'like', "%{$search}%");
        }


        // مرتب‌سازی بر اساس مقدار sort
        switch ($sort) {
            case 'cheapest':
                $query->orderBy('price', 'asc');
                break;
            case 'most_expensive':
                $query->orderBy('price', 'desc');
                break;
            case 'is_suggested':
                $query->orderBy('is_suggested', 'desc');
                break;
            case 'only_available':
                $query->orderBy('price', '!=', 0);
                break;
            case 'newest':
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        $products = $query->where('is_wholesale', false)->paginate(12);
        $productsuggesteds = Product::where('is_suggested', 1)->where('is_wholesale', false)->take(8)->get();
        $categorys = Category::orderBy('name', 'asc')->get();

        return view('khoshkbar.Home.all_product', compact('categorys', 'products', 'sort', 'search', 'productsuggesteds'));
    }
    public function filtercategories(Request $request)
    {
        $categories = $request->categories ?? [];

        $products = Product::query()->where('is_wholesale', false);

        if (!empty($categories)) {
            $products->whereIn('Id_category', $categories);
        }

        $products = $products->get(); // یا paginate اگر میخوای صفحه‌بندی داشته باشه

        return view('khoshkbar.Home.partials', compact('products'))->render();
    }

    public function filterprice(Request $request)
    {
        $minPrice = $request->min_price ?? 0;
        $maxPrice = $request->max_price ?? 20000000; // حداکثر قیمت دلخواه

        $products = Product::whereBetween('price', [$minPrice, $maxPrice])->where('is_wholesale', false)->get();

        // برگشت HTML رندر شده (partial view)
        return view('khoshkbar.Home.partials', compact('products'))->render();
    }
    public function productsByCategory($id)
    {
        $categorys = Category::orderBy('name', 'asc')->get();
        $products = Product::where('Id_category', $id)->where('is_wholesale', false)->paginate(12);
        $productsuggesteds = Product::where('is_suggested', 1)->where('is_wholesale', false)->take(8)->get();
        return view('khoshkbar.Home.byCategory', compact('products', 'productsuggesteds', 'categorys'));
    }

    public function about()
    {
        return view('khoshkbar.Home.about');
    }
    public function brandstory()
    {
        return view('khoshkbar.footer.brandstory');
    }
    public function frequently()
    {
        return view('khoshkbar.footer.frequently');
    }
     public function purchase_delivery()
    {
        return view('khoshkbar.footer.purchase_delivery');
    }
    public function terms()
    {
        return view('khoshkbar.footer.terms');
    }
   
}
