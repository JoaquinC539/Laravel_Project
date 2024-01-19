<?php

use Illuminate\Support\Facades\Route;
use App\Models\Vendedor;
use App\Models\Ventas;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/vendedor',[VendedorController::class,'index']);
// Route::get('/vendedor/{id}',[VendedorController::class,'show']);
Route::get('template/{templateName}',[TemplateController::class,'index']);
Route::get('vendedor/low/{id}',[VendedorController::class,'getQueryLow']);
Route::get('vendedor/miMetodo',[VendedorController::class,'miMetodo']);
Route::resource('vendedor',VendedorController::class);
Route ::resource('proveedor',ProveedorController::class);
Route ::resource('producto',ProductoController::class);


