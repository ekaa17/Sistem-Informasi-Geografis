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

// Hak akses semua user
Route::group(['middleware' => 'cekrole:Super Admin,Admin,User'], function() {
    Route::get('/dashboard', 
        function () {return view('pages/dashboard');
    });
    Route::resource('/data-lahan', LokasiBidangController::class)->names('data-lahan');
});

// Hak akses milik super admin dan admin
Route::group(['middleware' => 'cekrole:Super Admin,Admin,User'], function() {
    Route::get('/maps', [LokasiBidangController::class, 'titik_lokasi']);
    Route::get('/data-titik', [LokasiBidangController::class, 'json']);
});

// Hak akses milik superadmin
Route::group(['middleware' => 'cekrole:Super Admin'], function() {
    Route::resource('/data-staff', StaffController::class)->names('data-staff');
});
