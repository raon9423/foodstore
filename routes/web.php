<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\FacebookAuthController;
use App\Http\Controllers\OtpController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

//Otp
Route::post('/sendOtp', [OtpController::class, 'sendOtp'])->name('sendOtp');
Route::post('/verifyOtp', [OtpController::class, 'verifyOtp'])->name('verifyOtp');
// Thanh toán bằng zalopay
Route::post('/payWithZaloPay', [ShoppingCartController::class, 'payWithZaloPay'])->name('payWithZaloPay');
Route::post('/zalopay/callback', [ShoppingCartController::class, 'handleCallback'])->name('zalopay.callback');
// Route cho trang người dùng
Route::get('/zalopay/return', [ShoppingCartController::class, 'zalopayReturn'])->name('zalopay.return');
Route::post('/zalopay/notify', [ShoppingCartController::class, 'zalopayNotify'])->name('zalopay.notify');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/productcategory', [ProductController::class, 'productCategory']);
Route::get('/productcategory/{id_nhomsp}', [ProductController::class, 'productcategory'])->name('productcategory');
Route::get('/productDetails/{id_sanpham}', [ProductController::class, 'productDetail'])->name('productDetails');
Route::get('/', [HomeController::class, 'index']);
Route::get('/home/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/support', [HomeController::class, 'support']);
Route::get('/blog', [BlogController::class, 'blog']);
Route::get('/blogDetail/{id}', [BlogController::class, 'blogDetail'])->name('blogDetail');
Route::get('/search', [HomeController::class, 'search'])->name('search');

// log in with google
Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('/auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);
// log in with facebook
Route::get('/auth/facebook', [FacebookAuthController::class, 'redirect'])->name('facebook-auth');
Route::get('/auth/facebook/call-back', [FacebookAuthController::class, 'callbackFacebook']);
// shopping cart
// hiện thị giỏ hàng
Route::get('/cartView', [ShoppingCartController::class, 'cartView'])->name('cartView');
// thêm sản phẩm vào giỏ hàng
Route::get('/orderNow/{id_sanpham}', [ShoppingCartController::class, 'orderNow'])->name('orderNow');
// xóa sản phẩm khỏi giỏ hàng
Route::get('/removeItem/{id_sanpham}', [ShoppingCartController::class, 'removeItem'])->name('removeItem');
// xóa toàn bộ sản phẩm khỏi giỏ hàng
Route::get('/clearCart', [ShoppingCartController::class, 'clearCart'])->name('clearCart');
// cập nhật số lượng sản phẩm trong giỏ hàng
Route::post('/updateCart', [ShoppingCartController::class, 'updateCart'])->name('updateCart');
// thanh toan
Route::get('/checkOut', [ShoppingCartController::class, 'checkOut'])->name('checkOut');
Route::post('/processOrder', [ShoppingCartController::class, 'processOrder'])->name('processOrder');
// route cho trang admin

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/productlists', [AdminController::class, 'productlists'])->name('productlists');
    // product
// gọi ra form để thêm sản phẩm
Route::get('/createproduct', [AdminController::class, 'createproduct'])->name('createproduct');
// thêm sản phẩm vào database
Route::post('/addproduct', [AdminController::class, 'addproduct'])->name('addproduct');
// hiển thị danh sách sản phẩm
Route::get('/productlists', [AdminController::class, 'productlists'])->name('productlists');

// xóa sản phẩm
Route::get('/delete-product/{id_sanpham}', [AdminController::class, 'deleteProduct'])->name('deleteProduct');
// lấy thông tin sản phẩm
Route::get('/get-product/{id_sanpham}', [AdminController::class, 'getProduct'])->name('getProduct');
// cập nhật thông tin sản phẩm
Route::post('/update-product/{id_sanpham}', [AdminController::class, 'updateProduct'])->name('updateProduct');
// hiển thị thông tin chi tiết sản phẩm
Route::get('/productDetail/{id_sanpham}', [AdminController::class, 'productDetail'])->name('productDetail');
// tim kiem san pham
Route::get('/searchProduct', [AdminController::class, 'searchProduct'])->name('searchProduct');

// category
// hiển thị form thêm loại sản phẩm
Route::get('/createCategory', [AdminController::class, 'createcategory'])->name('createCategory');
// hiển thị danh sách loại sản phẩm
Route::get('/categorylists', [AdminController::class, 'categorylists'])->name('categorylists');
// thêm loại sản phẩm vào database
Route::post('/addCategory', [AdminController::class, 'addCategory'])->name('addCategory');
// xóa loại sản phẩm
Route::delete('/delete-category/{id_loaisp}', [AdminController::class, 'deleteCategory'])->name('deleteCategory');
// lấy thông tin loại sản phẩm
Route::get('/get-category/{id_loaisp}', [AdminController::class, 'getCategory'])->name('getCategory');
// cập nhật thông tin loại sản phẩm
Route::post('/update-category/{id_loaisp}', [AdminController::class, 'updateCategory'])->name('updateCategory');
// toaggle 
Route::post('/admin/toggle-status/{id_loaisp}', [AdminController::class, 'toggleStatus'])->name('admin.toggleStatus');

// group
// hiển thị form thêm nhóm sản phẩm
Route::get('/creategroup', [AdminController::class, 'creategroup'])->name('creategroup');
// hiển thị danh sách nhóm sản phẩm
Route::get('/grouplists', [AdminController::class, 'grouplists'])->name('grouplists');
// thêm nhóm sản phẩm vào database
Route::post('/addGroup', [AdminController::class, 'addGroup'])->name('addGroup');
Route::get('/deleteGroup/{id_nhomsp}', [AdminController::class, 'deleteGroup'])->name('deleteGroup');
Route::get('/get-group/{id_nhomsp}', [AdminController::class, 'getGroup'])->name('getGroup');
Route::post('/update-group/{id_nhomsp}', [AdminController::class, 'updateGroup'])->name('updateGroup');

// order 
// hiển thị danh sách đơn hàng
Route::get('/orderlists', [AdminController::class, 'orderlists'])->name('orderlists');
Route::post('/confirmOrder/{id_donhang}', [AdminController::class, 'confirmOrder'])->name('confirmOrder');
Route::get('/get-order-details/{id}', [AdminController::class, 'getOrderDetails']);
});





