<?php

use App\Http\Controllers\Auth\AuthController;
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

Route::middleware(['auth', 'check.user.type:0'])->group(function () {
    // Route cho Admin
    Route::get('/adm', function () {
        return view('admin');
    });
});

Route::middleware(['auth', 'check.user.type:1'])->group(function () {
    Route::get('/giaovien', function () {
        return view('giaovien');
    });

   
});


Route::middleware(['auth', 'check.user.type:1,2'])->group(function () {
    Route::get('/hocsinh', function () {
        return view('hocsinh');
    });
});

// Các route không yêu cầu xác thực
Route::get('/', function () {
    return view('welcome');
});


Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postLogin']);
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister']);
