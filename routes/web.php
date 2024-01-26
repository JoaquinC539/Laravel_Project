<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AuthController;
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

Route::get('/', [HomeController::class,'welcome']);
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    // Route::resource('vendedor',VendedorController::class);
});

// Route::get('dashboard', [HomeController::class,'dashboard'])->name('dashboard');
Route::get('template/{templateName}',[TemplateController::class,'index']);
Route::get('php/info',[TemplateController::class,'info']);
Route::get('vendedor/low/{id}',[VendedorController::class,'getQueryLow']);
Route::get('vendedor/miMetodo',[VendedorController::class,'miMetodo']);
Route::resource('vendedor',VendedorController::class);
Route ::resource('proveedor',ProveedorController::class);
Route ::resource('producto',ProductoController::class);
Route ::get('register',[RegisterController::class,'register']);
Route ::post('register',[RegisterController::class,'store'])->name('register');
Route ::get('login',[RegisterController::class,'login']);
Route ::post('login',[AuthController::class,'login'])->name('login');
Route ::post('logout',[AuthController::class,'logout'])->name('logout');


