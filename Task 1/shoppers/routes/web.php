<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\routeController;

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

Route::get('/', function () {
    return view('home');
});

route::get('/home', [routeController::class, 'home'])->name('home');
route::get('/ourTeam', [routeController::class, 'ourTeam'])->name('ourTeam');
route::get('/product', [routeController::class, 'product'])->name('product');
route::get('/about', [routeController::class, 'about'])->name('about');
route::get('/contact', [routeController::class, 'contact'])->name('contact');
