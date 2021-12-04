<?php
use App\Http\Controllers\SellerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CouponController;

use Illuminate\Support\Facades\Route; 

// Admin auth 
Route::group(['middleware' => 'admin_auth'], function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard']); 
    Route::get('admin/users', [UserController::class, 'UserData']);

// Admin Category
    Route::get('/admin/category',[AdminController::class,'admin_category'])->name('all.category');
    Route::get('/admin/add_category',[AdminController::class,'add_category'])->name('admin.addCategory');
    Route::post('/admin/insert_category',[AdminController::class,'insert_category'])->name('admin.insertCategory');
    Route::get('/admin/edit/{id}', [AdminController::class, 'CategoryEdit'])->name('category.edit');
    Route::post('/admin/update/{id}', [AdminController::class, 'category_update'])->name('category.update');
    Route::get('/admin/delete/{id}', [AdminController::class, 'CategoryDelete'])->name('category.delete');
    Route::get('admin/category/status/{status}/{id}', [AdminController::class,'status']);

// Admin Coupon
    Route::get('/admin/coupon',[CouponController::class,'index'])->name('all.coupon');
    Route::get('/admin/coupon/manage_coupon',[CouponController::class,'addCoupon'])->name('admin.addCoupon');
    Route::post('/admin/coupon/manage_coupon',[CouponController::class,'insert_Coupon'])->name('add.add_Coupon');
    Route::get('/admin/coupon/manage_coupon/{id}',[CouponController::class,'CouponEdit'])->name('admin.editCoupon');
    Route::post('/admin/coupon/manage_coupon_process/{id}',[CouponController::class,'Coupon_update'])->name('coupon.manage_coupon_process');
    Route::get('/admin/coupon/delete/{id}',[CouponController::class,'delete'])->name('admin.deleteCoupon');
 
// Admin Product
    Route::get('/admin/products',[AdminController::class,'admin_products']);
    Route::get('/admin/add_products',[AdminController::class,'add_products'])->name('admin.addProducts');
    Route::post('/admin/insert_products',[AdminController::class,'insert_products'])->name('admin.insertProduct');
    Route::get('/admin/product/product/{id}',[AdminController::class,'productEdit'])->name('admin.editProduct');
    Route::post('/admin/product/manage_product_process/{id}',[AdminController::class,'product_update'])->name('product.manage_product_process');
    Route::get('/admin/product/delete/{id}',[AdminController::class,'product_delete'])->name('admin.deleteProduct');
    Route::get('/admin/products/status/{status}/{id}',[AdminController::class,'product_status']);
// Admin logout
    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('error', 'Logout Successfully');
        return redirect('admin');
    });
});

// Admin login
Route::get('admin', [AdminController::class, 'index']);
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');

// Seller auth
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

// Seller login
Route::get('seller', [SellerController::class, 'index'])->name('seller');
Route::post('seller/auth', [SellerController::class, 'auth'])->name('seller.auth');

// User
Route::get('/', [HomeController::class, 'index']);
Route::get('/products', [HomeController::class, 'products'])->name('products');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/single-product', [HomeController::class, 'single_product'])->name('single_product');