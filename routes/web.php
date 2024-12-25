<?php

use App\Http\Controllers\LahanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LokasiBidangController;
use App\Http\Controllers\StaffController;

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
    return view('login');
});

Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::group(['middleware' => 'cekrole:Admin,Karyawan'], function() {
    Route::get('/dashboard', function () {return view('pages/dashboard');});
    Route::resource('/data-staff', StaffController::class)->names('data-staff');
    Route::resource('/data-maps', LokasiBidangController::class)->names('data-maps');
    Route::get('/maps', [LokasiBidangController::class, 'titik_lokasi']);
    Route::get('/data-titik', [LokasiBidangController::class, 'json']);
});

