<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GiayController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BanGiayController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CheckoutController;
use App\Http\Controllers\LienHeKhachController;
// trang admin
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // Quản lý liên hệ
    Route::get('/lienhe', [App\Http\Controllers\Admin\LienHeController::class, 'index'])->name('lienhe-list');
    Route::get('/lienhe/{id}/edit', [App\Http\Controllers\Admin\LienHeController::class, 'edit'])->name('lienhe-edit');
    Route::put('/lienhe/{id}', [App\Http\Controllers\Admin\LienHeController::class, 'update'])->name('lienhe-update');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // Quản lý đơn hàng
    Route::get('/checkouts', [App\Http\Controllers\Admin\CheckoutController::class, 'index'])->name('checkout-list');
    Route::get('/checkouts/{id}/edit', [App\Http\Controllers\Admin\CheckoutController::class, 'edit'])->name('checkout-edit');
    Route::put('/checkouts/{id}', [App\Http\Controllers\Admin\CheckoutController::class, 'updateStatus'])->name('checkout-update-status');
});
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user-list'); // Danh sách người dùng
    Route::get('/users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('user-create'); // Tạo người dùng
    Route::post('/users', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('user-store'); // Lưu người dùng
    Route::get('/users/{id}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('user-edit'); // Sửa người dùng
    Route::put('/users/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('user-update'); // Cập nhật người dùng
    Route::delete('/users/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('user-delete'); // Xóa người dùng
});
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // Route cho danh sách sản phẩm
    Route::get('/ban-giay', [BanGiayController::class, 'index'])->name('bangiay-list');

    // Route cho form thêm sản phẩm
    Route::get('/ban-giay/create', [BanGiayController::class, 'create'])->name('bangiay-create');

    // Route xử lý thêm sản phẩm
    Route::post('/ban-giay', [BanGiayController::class, 'store'])->name('bangiay-store');

    // Route cho form sửa sản phẩm
    Route::get('/ban-giay/{id}/edit', [BanGiayController::class, 'edit'])->name('bangiay-edit');

    // Route xử lý sửa sản phẩm
    Route::put('/ban-giay/{id}', [BanGiayController::class, 'update'])->name('bangiay-update');

    // Route xóa sản phẩm
    Route::delete('/ban-giay/{id}', [BanGiayController::class, 'destroy'])->name('bangiay-delete');
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('danhmuc', [CategoryController::class, 'index'])->name('cate-list');
    Route::post('danhmuc/store', [CategoryController::class, 'store'])->name('cate-store');
    Route::post('danhmuc/update/{id}', [CategoryController::class, 'update'])->name('cate-update');
    Route::delete('danhmuc/delete/{id}', [CategoryController::class, 'destroy'])->name('cate-delete');
});
Route::get('/trangadmin', function () {
    return view('admin.master');
})->name('trangadmin')->middleware('auth');
//trang khách hàng
Route::get('/lienhe/phanhoi', [App\Http\Controllers\LienHeKhachController::class, 'index'])->name('admin.lienhe.khach');


Route::get('/donhang/{id}', [PageController::class, 'showOrderDetail'])->name('donhang.detail');

Route::get('/don-hang', [PageController::class, 'showOrders'])->name('donhang');

Route::get('/danhmuc/{id}', [PageController::class, 'showByCategory'])->name('byCategory');
Route::post('/checkout', [PageController::class, 'submitCheckout'])->name('checkout.submit');




Route::get('/gioi-thieu', [PageController::class, 'gioithieu'])->name('gioithieu');
Route::get('/lien-he', [PageController::class, 'showForm'])->name('lienhe.form');
Route::post('/lien-he', [PageController::class, 'submitForm'])->name('lienhe.submit');


Route::get('/checkout/{id}', [PageController::class, 'showCheckoutForm'])->name('checkout.form');
Route::post('/checkout', [PageController::class, 'submitCheckout'])->name('checkout.submit');
Route::get('/checkout/thankyou', [PageController::class, 'thankYou'])->name('thankyou');




Route::prefix('giohang')->group(function () {
    Route::get('/', [PageController::class, 'showCart'])->name('giohang'); // Hiển thị giỏ hàng
    Route::post('/add-to-cart/{id}', [PageController::class, 'addToCart'])->name('giohang.add'); // Thêm sản phẩm vào giỏ hàng
    Route::post('/remove/{id}', [PageController::class, 'remove'])->name('giohang.remove'); // Xóa sản phẩm khỏi giỏ hàng
    Route::post('/clear', [PageController::class, 'clearCart'])->name('giohang.clear'); // Xóa toàn bộ giỏ hàng
    Route::post('/update', [PageController::class, 'updateCart'])->name('giohang.update'); // Cập nhật giỏ hàng
});


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

Route::post('/postlogin', [AuthController::class, 'postLogin'])->name('postlogin');
Route::post('/postsignin', [AuthController::class, 'postRegister'])->name('postsignin');

// Đăng xuất
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/', [GiayController::class, 'index'])->name('trangchu'); // Trang chủ
Route::get('/giay/{id}', [GiayController::class, 'show'])->name('chitietgiay'); // Chi tiết giày

// Tìm kiếm
Route::get('/search', [GiayController::class, 'search'])->name('search'); // Route cho tìm kiếm

Route::get('/dat-hang/{id}', function($id) {
    // xử lý đặt hàng tại đây (tùy bạn thêm)
    return "Đặt hàng sản phẩm ID: $id";
})->name('dat-hang');
