<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PetugasController;
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

Route::middleware(['guest'])->group(function(){
    Route::get('/',[AuthController::class,"index"])->name('login');
    Route::post('/', [AuthController::class, 'login']);
    Route::put('/', [AuthController::class, 'compliteAdd']);
    Route::get('/auth/redirect',[AuthController::class, "redirect"]);
    Route::get('/auth/callback', [AuthController::class, "callback"]);
});
Route::get('/admin/dashboard', [AdminController::class, "index"])->middleware('auth_admin')->name('dashboardadmin');
Route::get('/petugas/dashboard', [PetugasController::class, "index"])->middleware('auth_petugas')->name('dashboardpetugas');
Route::get('/auth/logout', [AuthController::class, "logout"])->middleware('auth')->name('logout');

