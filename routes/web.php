<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\UserController;

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

// Auth
Route::get('/', function(){
    return view('landingpage');
});

Route::prefix('/')->group(function () {
    Route::get('/daftar-keluhan',[ComplaintController::class, 'index'])->name('detail-keluhan');
    Route::get('/pengaduan',[ComplaintController::class, 'create_form'])->name('pengaduan');
    Route::post('/', [ComplaintController::class, 'create'])->name('complaint.create');
});


//auth
Route::get('/login', [AuthController::class, 'check'])->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'role:ADMIN,PETUGAS']], function(){
    Route::get('/dashboard', [ComplaintController::class, 'dashboard'])->name('dashboard');
    Route::get('/pengaduan/print/{id}', [ComplaintController::class, 'print'])->name('complaint.print');
    Route::prefix('complaint')->name('complaint.')->group(function () {
        Route::delete('/{id}', [ComplaintController::class, 'delete'])->name('delete');
        Route::get('/detail/{id}', [ComplaintController::class, 'detail'])->name('detail');
        Route::patch('/{id}', [ComplaintController::class, 'update'])->name('update');
    });
});

Route::group(['middleware' => ['auth', 'role:ADMIN']], function () {
        Route::get('users', [UserController::class, 'index'])->name('user.index');
        Route::prefix('user')->name('user.')->group(function () {
            Route::get('/create-user', [UserController::class, 'createForm'])->name('createForm');
            Route::post('/create', [UserController::class, 'create'])->name('create');
            Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete');
        });
});