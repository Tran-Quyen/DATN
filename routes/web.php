<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\WishlistController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/collections', [FrontendController::class, 'categories'])->name('categories.fe');
Route::get('/collections/{category_slug}', [FrontendController::class, 'products']);
Route::get('/collections/{category_slug}/{product_slug}', [FrontendController::class, 'productDetail']);
Route::get('/new-arrivals', [FrontendController::class, 'newArrival']);
Route::get('/featured-products', [FrontendController::class, 'featuredProducts']);
Route::get('/trending-products', [FrontendController::class, 'trendingProducts']);
Route::get('search', [FrontendController::class, 'searchProducts']);
Route::get('/news', function() {
    return view('frontend.news.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist');
    Route::get('cart', [CartController::class, 'index'])->name('cart');
    Route::get('checkout', [CheckoutController::class, 'index']);
    // Route::get('/vn_payment', [CheckoutController::class, 'vnpayment']);
    Route::get('orders', [OrderController::class, 'index'])->name('orders');
    Route::get('orders/{orderId}', [OrderController::class, 'show']);
    Route::get('profile', [App\Http\Controllers\Frontend\UserController::class, 'index'])->name('my-profile');
    Route::post('profile', [App\Http\Controllers\Frontend\UserController::class, 'updateUserDetails']);
    Route::get('change-password', [App\Http\Controllers\Frontend\UserController::class, 'password']);
    Route::post('change-password', [App\Http\Controllers\Frontend\UserController::class, 'changePassword']);

});



Route::get('thank-you', [FrontendController::class, 'thankyou']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/admin')->middleware(['auth', 'isAdmin'])->group(function(){
    //Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //setting
    Route::get('settings', [SettingController::class, 'index']);
    Route::post('settings', [SettingController::class, 'store']);
    //chart
    Route::controller(ChartController::class)->group(function () {
        Route::get('/statistic', 'index');
        Route::get('/statistic/chart', 'chart');
    });
    //category
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index')->name('category');
        Route::get('/category/create', 'create')->name('create-category');
        Route::post('/category', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}', 'update');
    });
    //brand
    Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class)->name('brand');
    //products
    Route::controller(ProductController::class)->group(function () {
       Route::get('/products', 'index');
       Route::get('/products/create', 'create');
       Route::post('/products', 'store');
       Route::get('/products/{product}/edit', 'edit');
       Route::put('/products/{product}', 'update');
    });
    Route::post('/product-image-delete', [ProductController::class, 'destroyImage'])->name('delete.img');
    Route::post('/product-delete',[ProductController::class ,'deleteProduct'])->name('delete-product');
    Route::get('/products-search',[ProductController::class ,'searchProduct'])->name('search.product');

    Route::controller(SliderController::class)->group(function () {
        Route::get('/sliders', 'index')->name('sliders');
        Route::get('/sliders/create', 'create')->name('sliders.create');
        Route::post('/sliders/create', 'store');
        Route::get('/sliders/{slider}/edit', 'edit');
        Route::put('/sliders/{slider}', 'update');
    });
    Route::controller(AdminOrderController::class)->group(function () {
        Route::get('/orders', 'index');
        Route::get('/orders/{orderId}', 'show');
        Route::put('/orders/{orderId}', 'updateOrdersStatus');
        Route::get('/invoice/{orderId}', 'viewInvoice');
        Route::get('/invoice/{orderId}/generate', 'generateInvoice');
        Route::get('/invoice/{orderId}/mail', 'mailInvoice');

    });

    Route::post('/sliders-delete',[SliderController::class ,'deleteSlider'])->name('delete.slider');

    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index');
        Route::get('/users/create', 'create');
        Route::post('/users', 'store');
        Route::get('/users/{user_id}/edit', 'edit');
        Route::put('/users/{user_id}', 'update');
    });
    Route::post('/user-delete',[UserController::class ,'deleteUser'])->name('delete.user');
    Route::get('/user-search',[UserController::class ,'searchUser'])->name('search.user');

});
