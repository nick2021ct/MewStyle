<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ShopController;
use App\Http\Middleware\CheckAdminMiddlerware;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/detail/{id}', [DetailController::class, 'detail'])->name('detail');
Route::get('/shop/{categoryId?}', [ShopController::class, 'index'])->name('shop');

Route::prefix('cart')->name('cart.')->middleware(['auth'])->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('list');
    Route::post('/add/{id}', [CartController::class, 'add'])->name('add');
    Route::patch('/update', [CartController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [CartController::class, 'delete'])->name('delete');

});

Route::post('/place-order', [PaymentController::class, 'placeOrder'])->name('order.place');
Route::get('/thankyou', [PaymentController::class, 'thankyou'])->name('thankyou');


Route::get('/checkout', [CheckOutController::class, 'checkout'])->name('checkout');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/', [CategoryController::class, 'list'])->name('list');
        Route::get('/add', [CategoryController::class, 'create'])->name('add');
        Route::post('/add', [CategoryController::class, 'add']);
        Route::get('/edit/{id}', [CategoryController::class, 'update'])->name('edit');
        Route::post('/edit/{id}', [CategoryController::class, 'edit']);
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
    });


    Route::prefix('product')->name('product.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('list');
        Route::get('/add', [ProductController::class, 'create'])->name('add');
        Route::post('/add', [ProductController::class, 'add']);
        Route::get('/edit/{id}', [ProductController::class, 'update'])->name('edit');
        Route::post('/edit/{id}', [ProductController::class, 'edit']);
        Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('delete');
    });

    Route::prefix('banner')->name('banner.')->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name('list');
        Route::get('/add', [BannerController::class, 'create'])->name('add');
        Route::post('/add', [BannerController::class, 'add']);
        Route::get('/edit/{id}', [BannerController::class, 'update'])->name('edit');
        Route::post('/edit/{id}', [BannerController::class, 'edit']);
        Route::get('/delete/{id}', [BannerController::class, 'destroy'])->name('delete');
    });
});



