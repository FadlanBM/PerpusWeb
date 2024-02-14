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
    Route::get('/auth/redirect',[AuthController::class, "redirect"]);
    Route::get('/auth/callback', [AuthController::class, "callback"]);
});

Route::get('/dashboard', [AdminController::class, "index"])->middleware('role:admin')->name('dashboardadmin');
Route::get('/petugas', [PetugasController::class, "index"])->middleware('role:petugas')->name('dashboardpetugas');
