<?php

use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Cart\OrderController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\NewsletterController;
use App\Http\Controllers\Home\UserPanelController;
use App\Http\Controllers\panel\CategoryController;
use App\Http\Controllers\panel\PostController;
use App\Http\Controllers\panel\ProductController;
use App\Http\Controllers\panel\SliderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Home\ReviewController;
use App\Http\Controllers\Home\WholesaleInquiryController;
use App\Http\Controllers\panel\Dashborad;
use App\Http\Controllers\panel\Discountcontroller;
use App\Http\Controllers\panel\FooterController;
use App\Http\Controllers\panel\OfferController;
use App\Http\Controllers\panel\WholesaleInquiryAdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




Route::prefix('panel')->middleware(['auth', 'can:access-panel'])->group(function () {

    Route::get('/dashborad', [Dashborad::class, "dashborad"])->name('Panel.Dashborad');
    Route::prefix('category')->group(function () {
        Route::get('/create', [CategoryController::class, "create"])->name('Panel.Category.Create');
        Route::post('/create', [CategoryController::class, "createpost"])->name('Panel.Category.createpost');

        Route::get('/categories', [CategoryController::class, "categories"])->name('Panel/Category/categories');

        Route::get('/Edit/{id}', [CategoryController::class, "Edit"])->name('Panel.Category.Edit');
        Route::post('/Edit/{id}', [CategoryController::class, "update"])->name('Panel.Category.update');

        Route::get('/Delete/{id}', [CategoryController::class, "Delete"])->name('Panel.Category.Delete');
    });
    Route::prefix('footer')->group(function () {
        Route::get('/footershow', [FooterController::class, 'index'])->name('panel.footershow');

        Route::get('/footerupdate/{id}', [FooterController::class, 'updateshow'])->name('panel.footer.updateshow');
        Route::post('/footerupdate/{id}', [FooterController::class, 'update'])->name('panel.footer.update');
    });


    Route::prefix('product')->group(function () {
        Route::get('/create', [ProductController::class, "create"])->name('Panel.Product.Create');
        Route::post('/create', [ProductController::class, "storeproduct"])->name('Panel.Product.storeproduct');

        Route::get('/products', [ProductController::class, "products"])->name('products.index');

        Route::get('/Edit/{id}', [ProductController::class, "Edit"])->name('Panel.Product.Edit');
        Route::post('/Edit/{id}', [ProductController::class, "update"])->name('Panel.Product.update');

        Route::get('/Delete/{id}', [ProductController::class, "Delete"])->name('Panel.Product.Delete');

        Route::get('/createimage/{id}', [ProductController::class, "Createimage"])->name('Panel.Product.Createimage');
        Route::post('/createimage/{id}', [ProductController::class, "storeimage"])->name('Panel.Product.Storeimage');

        Route::get('/gallery/{id}', [ProductController::class, "Gallery"])->name('Panel.Product.Gallery');

        Route::get('/Deletegallery/{id}', [ProductController::class, "Deletegallery"])->name('Panel.Product.Deletegallery');

        Route::get('specifications/{id}', [ProductController::class, 'productspecification'])->name('Panel.Product.Productspecification');

        // روت ذخیره مشخصات جدید
        Route::post('specifications/{id}', [ProductController::class, 'Specification'])->name('Panel.Product.Specification');

        // روت حذف مشخصه
        Route::get('specification/{id}', [ProductController::class, 'DeleteSpecification'])->name('Panel.Product.DeleteSpecification');
    });

    Route::prefix('slider')->group(function () {
        Route::get('/create', [SliderController::class, "Create"])->name('Panel.Slider.Create');
        Route::post('/create', [SliderController::class, "Storeslider"])->name('Panel.Slider.Storeslider');

        Route::get('/slider', [SliderController::class, "Slider"])->name('Panel.Slider.Slider');
        Route::get('/Delete/{id}', [SliderController::class, "Delete"])->name('Panel.Slider.Delete');

        Route::get('/createSlidertwo', [SliderController::class, "Createslider"])->name('Panel.Slider.Createslider');
        Route::post('/createSlidertwo', [SliderController::class, "Slidertwo"])->name('Panel.Slider.Slidertwo');
        Route::get('/galleryslider', [SliderController::class, "Galleryslider"])->name('Panel.Slider.Galleryslider');
        Route::get('/Deletegallery/{id}', [SliderController::class, "Deletegallery"])->name('Panel.Slider.Deletegallery');
    });
    Route::prefix('post')->group(function () {
        Route::get('/create', [PostController::class, "Create"])->name('Panel.Post.Create');
        Route::post('/create', [PostController::class, "Storepost"])->name('Panel.Post.Storepost');

        Route::get('/posts', [PostController::class, "posts"])->name('Panel.Post.posts');

        Route::get('edit/{id}', [PostController::class, 'Edit'])->name('Panel.Post.Edit');
        Route::post('edit/{id}', [PostController::class, 'update'])->name('Panel.Post.update');
        Route::post('upload-image', [PostController::class, 'uploadImage'])->name('upload.image');
        Route::get('Delete/{id}', [PostController::class, "Delete"])->name('Panel.Post.Delete');
    });
    Route::prefix('offer')->group(function () {
        Route::get('/create', [OfferController::class, "offershow"])->name('Panel.Offer.offershow');
        Route::post('/create', [OfferController::class, "offercreate"])->name('Panel.Offer.offercreate');

        Route::get('/offerlist', [OfferController::class, "offerlist"])->name('Panel/Offer/offerlist');

        Route::get('/Delete/{id}', [OfferController::class, "Delete"])->name('Panel.Offer.Delete');
    });

    Route::resource('discounts', DiscountController::class);
});

// گروه مربوط به سبد خرید
Route::prefix('cart')->group(function () {
    Route::post('add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/', [CartController::class, 'showCart'])->name('cart.step1'); // صفحه سبد خرید
    Route::post('update/{cartItemId}', [CartController::class, 'updateQuantity'])->name('cart.update');
    Route::delete('remove/{cartItemId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
});

// گروه مربوط به فرآیند سفارش (checkout)
Route::prefix('checkout')->group(function () {
    Route::get('/', [OrderController::class, 'step2'])->name('cart.step2'); // فرم اطلاعات سفارش
    Route::post('/', [OrderController::class, 'placeOrder'])->name('cart.placeOrder'); // ذخیره سفارش
    Route::get('/complete', [OrderController::class, 'step3'])->name('cart.step3'); // صفحه اتمام خرید
});

// تأیید نهایی سفارش
Route::get('/order/confirm/{order}', [OrderController::class, 'confirm'])->name('order.confirm');


Route::prefix('/')->group(function () {
    Route::get('home', [HomeController::class, 'home'])->name('home');
    Route::get('product/{id}', [HomeController::class, 'product'])->name('Product');
    Route::get('products', [HomeController::class, 'All_product'])->name('All_product');
    Route::get('/wholesale', [HomeController::class, 'wholesale'])->name('products.wholesale');
    Route::post('/wholesale/inquiry', [WholesaleInquiryController::class, 'store'])->name('wholesale.inquiry.store');
    Route::get('/products/category/{id}', [HomeController::class, 'productsByCategory'])->name('products.byCategory');
    Route::get('allpost', [HomeController::class, 'allpost'])->name('Allpost');
    Route::get('post/{id}', [HomeController::class, 'post'])->name('Post');
    Route::get('contact', [HomeController::class, 'contact'])->name('Contact');
    Route::post('contact', [HomeController::class, 'contactpost'])->name('Contactpost');
    Route::get('/products/filtercategories', [HomeController::class, 'filtercategories'])->name('products.filtercategories');
    Route::get('/products/filterprice', [HomeController::class, 'filterprice'])->name('products.filterprice');
    Route::get('/about', [HomeController::class, 'about'])->name('About');
    Route::get('/brandstory', [HomeController::class, 'brandstory'])->name('Brandstory');
    Route::get('/frequently', [HomeController::class, 'frequently'])->name('Frequently');
    Route::get('/purchase_delivery', [HomeController::class, 'purchase_delivery'])->name('Purchase_delivery');
    Route::get('/terms', [HomeController::class, 'terms'])->name('Terms');
    Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');


    Route::prefix('user')->middleware('auth')->group(function () {
        Route::get('dashboard', [UserPanelController::class, 'dashboard'])->name('Dashboard');
        Route::post('/dashboard', [UserPanelController::class, "updateProfile"])->name('user.profile.update');
        Route::post('/password', [UserPanelController::class, 'updatePassword'])->name('user.password.update');
        Route::post('/tikets', [UserPanelController::class, 'tiketspost'])->name('Tiketspost');
    });

    Route::middleware(['auth'])->group(function () {
        Route::post('/products/{id}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    });
});
require __DIR__ . '/auth.php';
