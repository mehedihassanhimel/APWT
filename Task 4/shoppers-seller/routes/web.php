<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\GeoLocationController;
use App\Http\Controllers\SalesFilterController;



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


Route::resource('salesfilter', SalesFilterController::class)->middleware('AuthenticateSeller');

route::get('/product', [CustomerController::class, 'product'])->name('product');
route::get('/cart', [CustomerController::class, 'cart'])->name('cart');
Route::patch('update-cart', [CustomerController::class, 'update'])->name('update');
Route::delete('remove-from-cart', [CustomerController::class, 'remove'])->name('remove');
Route::get('add-to-cart/{id}', [CustomerController::class, 'addToCart'])->name('addToCart');
Route::post('/checkout',[CustomerController::class, 'checkout'])
->middleware('AuthenticateSeller')
->name('checkout');


Route::get('/sales_search', [SalesController::class, 'index'])
->middleware('AuthenticateSeller')->name('sales_search');
Route::get('/sales_search/action', [SalesController::class, 'action'])->name('sales_search.action');

Route::get('/', function () {
    return view('welcome');
});
Route::resource('products', ProductController::class)->middleware('AuthenticateSeller');
route::get('/home', [SellerController::class, 'home'])
->middleware('AuthenticateSeller')->name('home');

route::get('/seller/registration', [SellerController::class, 'registration'])->name('seller.registration');
route::post('/seller/registration', [SellerController::class, 'registrationSubmit'])->name('seller.registration');
route::get('/seller/login', [SellerController::class, 'login'])->name('seller.login');
route::post('/seller/login', [SellerController::class, 'loginSubmit'])->name('seller.login');
route::get('/operation', [SellerController::class, 'operation'])
->middleware('AuthenticateSeller')->name('operation');
route::get('/sales', [SellerController::class, 'sales'])
->middleware('AuthenticateSeller')->name('sales');
//route::get('/show', [ProductController::class, 'show'])->name('show');
Route::get('get-address-from-ip',
[GeoLocationController::class, 'index']);

Route::get('/logout', function () {
   
    session()->forget('user');
    session()->forget('cart');
    // session()->flash();

return redirect('/seller/login');
});