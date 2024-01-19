<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('template/{templateName}',[TemplateController::class,'index']);
Route::get('vendedor/low',[VendedorController::class,'getQueryLow']);
Route::get('vendedor/miMetodo',[VendedorController::class,'miMetodo']);
Route::resource('vendedor',VendedorController::class);
