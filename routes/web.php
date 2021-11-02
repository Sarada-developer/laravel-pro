<?php
use App\Http\Controllers\SellerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
// admin auth
Route::group(['middleware' => 'admin_auth'], function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('admin/users', [UserController::class, 'UserData']);
    Route::get('/admin/category',[AdminController::class,'admin_category']);
    Route::get('/admin/add_category',[AdminController::class,'add_category'])->name('admin.addCategory');
    Route::get('/admin/products',[AdminController::class,'admin_products']);
    Route::get('/admin/add_products',[AdminController::class,'add_products'])->name('admin.addProducts');
    Route::post('/admin/insert_category',[AdminController::class,'insert_category'])->name('admin.insertCategory');
    Route::post('/admin/insert_products',[AdminController::class,'insert_products'])->name('admin.insertProduct');
    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('error', 'Logout Successfully');
        return redirect('admin');
    });
});
Route::get('admin', [AdminController::class, 'index']);
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');

// seller auth
Route::group(['middleware' => 'seller_auth'], function () {
    Route::get('seller/dashboard', [SellerController::class,'dashboard']);
    Route::get('seller/users', [UserController::class, 'UserData']);
    Route::get('/seller/products',[SellerController::class,'seller_products'])->name('seller.products');
    Route::get('/seller/add_products',[SellerController::class,'add_products'])->name('seller.addProducts');
    Route::post('/seller/insert_category',[SellerController::class,'insert_category'])->name('seller.insertCategory');
    Route::post('/seller/insert_products',[SellerController::class,'insert_products'])->name('seller.insertProduct');
    Route::get('seller/logout', function () {
        session()->forget('SELLER_LOGIN');
        session()->forget('SELLER_ID');
        session()->flash('error', 'Logout Successfully');
        return redirect('seller');
    });
});
Route::get('seller', [SellerController::class, 'index']);
Route::post('seller/auth', [SellerController::class, 'auth'])->name('seller.auth');

// user
Route::get('/', [HomeController::class, 'index']);
Route::get('/products', [HomeController::class, 'products'])->name('products');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/single-product', [HomeController::class, 'single_product'])->name('single_product');