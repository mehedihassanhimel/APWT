<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerAPIController;
use App\Http\Controllers\CustomerAPIController;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
route::get('/sales', [SellerAPIController::class, 'sales'])
//->middleware('AuthenticateSeller')
->name('sales');
Route::post('/checkout',[CustomerAPIController::class, 'checkout'])
->middleware('AuthenticateSeller')
->name('checkout');

route::post('/seller/registration', [SellerAPIController::class, 'registrationSubmit'])->name('seller.registration');