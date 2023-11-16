<?php

use Illuminate\Support\Facades\Route;

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

    Route::get('registros',[RegistrosController::class,'index']);
    Route::post('registros', [RegistrosController::class,'create'])->name('registros.store');
    Route::get('registros/create',[RegistrosController::class,'create']);
    Route::get('registros/{registros}',[RegistrosController::class,'Show']);
