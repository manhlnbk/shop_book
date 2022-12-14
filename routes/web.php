<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\Users\UserController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use Faker\Guesser\Name;

Route::get('admin/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/login', [LoginController::class, 'store']);
Route::get('admin/register', [LoginController::class, 'Register']);
Route::post('admin/register', [LoginController::class, 'userRegister']);
Route::get('admin/logout', [LoginController::class, 'logout']);


Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);

        Route::get('statistical', [MainController::class, 'statistical']);

        #user
        Route::resource('users', UserController::class)->shallow();
        Route::get('listUser', [UserController::class, 'index'])->name('index');
        Route::get('create', [UserController::class, 'create']);
        Route::post('create', [UserController::class, 'store']);
        Route::get('/active/update', [UserController::class,'updateStatus'])->name('users.update.active');
        Route::get('user-profile', [UserController::class, 'userProfile']);
        Route::post('user-profile', [UserController::class, 'updateUserProfile']);

        #Menu
        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
        });

        #Product
        Route::prefix('products')->name('product.')->group(function () {
            Route::get('add', [ProductController::class, 'create'])->name('create');
            Route::post('add', [ProductController::class, 'store'])->name('store');
            Route::get('list', [ProductController::class, 'index'])->name('index');
            Route::post('search', [ProductController::class, 'search'])->name('search');
            Route::get('edit/{id}', [ProductController::class, 'show'])->name('edit');
            Route::post('edit/{id}', [ProductController::class, 'update'])->name('update');
            Route::DELETE('destroy', [ProductController::class, 'destroy'])->name('destroy');
        });

        #Upload
        Route::post('upload/services', [\App\Http\Controllers\Admin\UploadController::class, 'store']);

        #Cart
        Route::get('customers', [\App\Http\Controllers\Admin\CartController::class, 'index'])->name('customers');
        Route::get('customers/pending', [\App\Http\Controllers\Admin\CartController::class, 'Pending'])->name('customers.pending'); 
        Route::get('customers/{status}', [\App\Http\Controllers\Admin\CartController::class, 'CusStatus']);
        Route::get('customers/accept/{id}', [\App\Http\Controllers\Admin\CartController::class, 'accept'])->name('cart.accept');
        Route::get('customers/cancel/{id}', [\App\Http\Controllers\Admin\CartController::class, 'cancel'])->name('cart.cancel');
        Route::get('customers/accept/cancel/{id}', [\App\Http\Controllers\Admin\CartController::class, 'cancelTWO'])->name('cart.accept.cancel');
        Route::get('customers/view/{customer}', [\App\Http\Controllers\Admin\CartController::class, 'show']);
    });
});

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('home');
Route::post('/services/load-product', [App\Http\Controllers\MainController::class, 'loadProduct']);

// login
Route::get('login', [App\Http\Controllers\LoginUserController::class, 'index'])->name('login');
Route::post('login', [App\Http\Controllers\LoginUserController::class, 'login']);
Route::get('register', [App\Http\Controllers\LoginUserController::class, 'registerForm'])->name('register');
Route::post('register', [App\Http\Controllers\LoginUserController::class, 'register']);
Route::get('logout', [App\Http\Controllers\LoginUserController::class, 'logout'])->name('logout');

//dashboard
Route::get('user/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('user/profile', [App\Http\Controllers\DashboardController::class, 'profile'])->name('user.profile');
Route::post('user/profile', [App\Http\Controllers\DashboardController::class, 'profileUpdate'])->name('user.profile.update');
Route::get('user/password', [App\Http\Controllers\DashboardController::class, 'password'])->name('user.password');
Route::post('user/password', [App\Http\Controllers\DashboardController::class, 'passwordUpdate'])->name('user.password.update');
Route::get('user/order', [App\Http\Controllers\DashboardController::class, 'order'])->name('user.order');

Route::get('danh-muc/{id}-{slug}.html', [App\Http\Controllers\MenuController::class, 'index']);
Route::get('san-pham/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'index']);
Route::post('search', [App\Http\Controllers\MainController::class, 'search'])->name('search');

Route::post('add-cart', [App\Http\Controllers\CartController::class, 'index'])->name('add-cart');
Route::get('carts', [App\Http\Controllers\CartController::class, 'show']);
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'update']);
Route::get('carts/delete/{id}', [App\Http\Controllers\CartController::class, 'remove']);
Route::get('carts/clear', [App\Http\Controllers\CartController::class, 'clear']);
Route::post('carts', [App\Http\Controllers\CartController::class, 'addCart'])->name('checkoutPost');
Route::get('checkout', [App\Http\Controllers\CartController::class, 'CheckoutForm'])->name('checkout');
Route::get('carts/wishlist', [App\Http\Controllers\CartController::class, 'addWishlist'])->name('addWishlist');
Route::get('wishlist', [App\Http\Controllers\CartController::class, 'Wishlist'])->name('wishlist');
Route::get('wishlist/delete/{id}', [App\Http\Controllers\CartController::class, 'Delete_Wishlist'])->name('deleteWishlist');