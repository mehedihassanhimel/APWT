<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\routeController;
use App\Http\Controllers\CustomerController;

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
    return view('pages.home');
});

route::get('/home', [routeController::class, 'home'])->name('home');
route::get('/ourTeam', [routeController::class, 'ourTeam'])->name('ourTeam');
route::get('/product', [routeController::class, 'product'])->name('product');
route::get('/about', [routeController::class, 'about'])->name('about');
route::get('/contact', [routeController::class, 'contact'])->name('contact');
route::get('/sampleLayout', [routeController::class, 'sampleLayout'])->name('sampleLayout');
route::get('/customer/create', [customerController::class, 'create'])->name('customer.create');
route::post('/customer/create', [customerController::class, 'createSubmit'])->name('customer.create');
route::get('/customer/list', [customerController::class, 'list'])->name('customer.list');
route::get('/customer/edit{id}', [customerController::class, 'Edit'])->name('customer.edit');;