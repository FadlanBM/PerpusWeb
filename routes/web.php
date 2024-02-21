<?php

use App\Http\Controllers\AddPinjamanBukuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardPetugasController;
use App\Http\Controllers\DashboradAdminController;
use App\Http\Controllers\HistoryPeminjamanController;
use App\Http\Controllers\ManagementAdminController;
use App\Http\Controllers\ManagementBukuAdminController;
use App\Http\Controllers\ManagementBukuController;
use App\Http\Controllers\ManagementPeminjamController;
use App\Http\Controllers\ManagementPetugasController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProfileAkunController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\validasipetugascontroller;
use App\Http\Controllers\ValidasiPetugasController as ControllersValidasiPetugasController;
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

Route::get('/admin/management/profile', [ProfileAkunController::class, 'index'])->middleware('auth')->name('profile.petugas');
Route::put('/admin/management/profile/update/{id}', [ProfileAkunController::class, 'update'])->middleware('auth')->name('profile.update');
Route::delete('/admin/management/profile/delete/{id}', [ProfileAkunController::class, 'destroy'])->middleware('auth')->name('profile.delete');
Route::put('/admin/management/profile/reset/pass/{id}', [ProfileAkunController::class, 'resetPass'])->middleware('auth')->name('profile.reset');

Route::middleware(['auth_admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardAdminController::class, 'index'])->name('dashboardadmin');
    Route::get('/admin/management/buku', [ManagementBukuAdminController::class, 'index'])->name('managementbukuadmin');
    Route::get('/admin/management/petugas', [ManagementPetugasController::class, 'index'])->name('managementpetugas');
    Route::get('/admin/management/petugas/validasi', [ControllersValidasiPetugasController::class, 'index'])->name('validasipetugas');
    Route::put('/admin/management/petugas/aktivasi/{id}', [ControllersValidasiPetugasController::class, 'validasi']);
    Route::put('/admin/management/petugas/destroy/{id}', [ControllersValidasiPetugasController::class, 'destroy']);
});

Route::middleware(['auth_petugas'])->group(function () {
        Route::get('/petugas/dashboard', [DashboardPetugasController::class, 'index'])->name('dashboardpetugas');
        Route::get('/petugas/management/peminjam', [ManagementPeminjamController::class, 'index'])->name('managementpeminjam');
        Route::get('/petugas/management/buku', [ManagementBukuController::class, 'index'])->name('managementbuku');
        Route::get('/petugas/pinjaman/add', [AddPinjamanBukuController::class, 'index'])->name('addpinjaman');
        Route::get('/petugas/pinjaman/history', [HistoryPeminjamanController::class, 'index'])->name('historypeminjam');
});

Route::get('/auth/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
