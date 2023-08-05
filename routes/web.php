<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Admin\AdminAddCouponComponent;
use App\Http\Livewire\Admin\AdminCouponsComponent;
use App\Http\Livewire\Admin\AdminCustomersComponent;
use App\Http\Livewire\Admin\AdminEditCouponComponent;
use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminOrderDetailsComponent;
use App\Http\Livewire\Admin\CustomersComponent;
use App\Http\Livewire\AdminContactComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\User\UserChangePasswordComponent;
use App\Http\Livewire\User\UserEditProfileComponent;
use App\Http\Livewire\User\UserOrderDetailsComponent;
use App\Http\Livewire\User\UserOrdersComponent;
use App\Http\Livewire\User\UserProfileComponent;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', \App\Http\Livewire\HomeComponent::class)->name('home.index');

Route::get('/shop', \App\Http\Livewire\ShopComponent::class)->name('shop');

Route::get('/product/{slug}', \App\Http\Livewire\DetailsComponent::class)->name('product.details');

Route::get('/cart', \App\Http\Livewire\CartComponent::class)->name('shop.cart');

Route::get('/wishlist', \App\Http\Livewire\WishlistComponent::class)->name('shop.wishlist');

Route::get('/checkout', \App\Http\Livewire\CheckoutComponent::class)->name('shop.checkout');

Route::get('/contact-us', ContactComponent::class)->name('contact');

Route::get('/product-category/{slug}}', \App\Http\Livewire\CategoryComponent::class)->name('product.category');

Route::get('/search', \App\Http\Livewire\SearchComponent::class)->name('product.search');

Route::get("/thank-you", ThankyouComponent::class)->name('thankyou');

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', \App\Http\Livewire\User\UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/user/profile', UserProfileComponent::class)->name('user.profile');
    Route::get('/user/edit', UserEditProfileComponent::class)->name('user.profile_edit');
    Route::get('/user/orders', UserOrdersComponent::class)->name('user.orders');
    Route::get('/user/orders/{order_id}', UserOrderDetailsComponent::class)->name('user.orderdetails');
    Route::get('/user/change-password', UserChangePasswordComponent::class)->name('user.changepassword');
});

Route::middleware(['auth', 'auth-admin'])->group(function () {
    Route::get('/admin/dashboard', \App\Http\Livewire\Admin\AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories', \App\Http\Livewire\Admin\AdminCategoriesComponent::class)->name('admin.categories');
    Route::get('/admin/category/add', \App\Http\Livewire\Admin\AdminAddCategoryComponent::class)->name('admin.category.add');
    Route::get('/admin/category/edit/{category_id}', \App\Http\Livewire\Admin\AdminEditCategoryComponent::class)->name('admin.category.edit');
    Route::get('/admin/products', \App\Http\Livewire\Admin\AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/product/add', \App\Http\Livewire\Admin\AdminAddProductComponent::class)->name('admin.product.add');
    Route::get('/admin/product/edit/{product_id}', \App\Http\Livewire\Admin\AdminEditProductComponent::class)->name('admin.product.edit');
    Route::get('admin/slider', \App\Http\Livewire\Admin\AdminHomeSliderComponent::class)->name('admin.home.slider');
    Route::get('admin/slider/add', \App\Http\Livewire\Admin\AdminAddHomeSlideComponent::class)->name('admin.home.slider.add');
    Route::get('admin/slider/edit/{slide_id}', \App\Http\Livewire\Admin\AdminEditHomeSlideComponent::class)->name('admin.home.slider.edit');
    Route::get('/admin/orders', AdminOrderComponent::class)->name('admin.orders');
    Route::get('/admin/orders/{order_id}', AdminOrderDetailsComponent::class)->name('admin.orderdetails');
    Route::get('/admin/coupons', AdminCouponsComponent::class)->name('admin.coupons');
    Route::get('/admin/coupon/add', AdminAddCouponComponent::class)->name('admin.addcoupon');
    Route::get('/admin/coupon/edit/{coupon_id}', AdminEditCouponComponent::class)->name('admin.editcoupon');
    Route::get('/admin/contact', AdminContactComponent::class)->name('admin.contact');
    Route::get('admin/customers', AdminCustomersComponent::class)->name('admin.customers');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
