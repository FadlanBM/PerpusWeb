<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardPetugasController;
use App\Http\Controllers\DashboradAdminController;
use App\Http\Controllers\ManagementAdminController;
use App\Http\Controllers\ManagementPeminjamController;
use App\Http\Controllers\ManagementPetugasController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\PetugasAllow;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::get('/register/complete/{id}', [RegisterController::class, 'index_complete'])->name('register.complete');
    Route::post('/', [AuthController::class, 'loginform']);
    Route::put('/register/complete/{id}', [RegisterController::class, 'compliteAdd'])->name('data.update');
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    Route::get('/auth/redirect', [AuthController::class, 'redirect']);
    Route::get('/auth/callback', [AuthController::class, 'callback']);
});

Route::middleware(['auth_admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardAdminController::class, 'index'])->name('dashboardadmin');
    Route::get('/admin/management/admin', [ManagementAdminController::class, 'index'])->name('managementadmin');
    Route::get('/admin/management/petugas', [ManagementPetugasController::class, 'index'])->name('managementpetugas');
    Route::get('/admin/management/peminjam', [ManagementPeminjamController::class, 'index'])->name('managementpeminjam');
});

Route::middleware(['auth_petugas'])->group(function () {
    Route::get('/petugas/dashboard', [DashboardPetugasController::class, 'index'])->name('dashboardpetugas');
});

Route::get('/auth/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
