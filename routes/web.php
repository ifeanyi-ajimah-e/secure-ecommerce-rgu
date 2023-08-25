<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/admin', function () {
    return view('auth.mylogin');
})->middleware('guest');


Route::get('/', [App\Http\Controllers\ExternalController::class, 'index']);
Route::get('/shop', [App\Http\Controllers\ExternalController::class, 'shopIndex']);

Route::view('about','external.about');
Route::view('contact','external.contact');


Route::view('user-login','external.login');
Route::view('sign-up','external.register');



Route::get('/shop', [App\Http\Controllers\ExternalController::class, 'shopIndex']);
Route::get('product-detail/{id}',[App\Http\Controllers\ExternalController::class, 'showProduct'])->name('product.detail');


Route::post('customer-login',[App\Http\Controllers\Auth\CustomerLoginController::class, 'authenticate'])->name('customer-login');
Route::post('customer-logout',[App\Http\Controllers\Auth\CustomerLoginController::class, 'logout'])->name('customer-logout');

Route::get('/verifyOtp',[App\Http\Controllers\VerifyOTPController::class, 'showVerifyForm'])->middleware('auth');
Route::post('/verifyOTP',[App\Http\Controllers\VerifyOTPController::class,'verifyOTP']);

Route::get('/resend-otp',[App\Http\Controllers\Auth\LoginController::class,'resendOtp'])->middleware('auth');



Auth::routes(['verfiy' => true]);


Route::group(['middleware'=>['auth','verified','twoFA','usertype:admin'] ],function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//roles and permission
Route::resource('role',App\Http\Controllers\RoleController::class);
Route::resource('permission',App\Http\Controllers\PermissionController::class);

Route::resource('order',App\Http\Controllers\OrderController::class);
Route::resource('category',App\Http\Controllers\CategoryController::class);
Route::resource('product',App\Http\Controllers\ProductController::class);
Route::resource('brand',App\Http\Controllers\BrandController::class);

Route::post('activate-product', [App\Http\Controllers\ProductController::class, 'activateProduct']);
Route::get('size-list',[App\Http\Controllers\ProductController::class,'getSizes']);
Route::get('color-list',[App\Http\Controllers\ProductController::class,'getColors']);
//admin
Route::get('admin-list', [App\Http\Controllers\AdminUserController::class, 'index']);
Route::post('add-admin', [App\Http\Controllers\AdminUserController::class, 'storeAdmin'])->name('user.store');
Route::put('update-admin/{id}', [App\Http\Controllers\AdminUserController::class, 'updateAdmin'])->name('user.update');

});




Route::group(['middleware'=>['auth','verified','usertype:customer'] ],function () {

    // Route::view('checkout','external.checkout');
    Route::get('/checkout', [App\Http\Controllers\CartController::class,'checkOut']);
    Route::resource('cart',App\Http\Controllers\CartController::class);
    Route::post('/cart-update/{id}',[App\Http\Controllers\CartController::class,'cartQuantityUpdate']);
    Route::post('/cart-remove/{id}',[App\Http\Controllers\CartController::class,'cartRemove']);
    
});




