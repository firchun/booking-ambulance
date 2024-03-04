<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\SupirController;
use App\Http\Controllers\AmbulanceController;
use App\Http\Controllers\PetiController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PemesananController;

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

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

Route::controller(AuthController::class)->group(function () {
    //Route Login
    Route::get('login/user', 'showPenggunaLoginForm')->name('auth.pengguna_form');
    Route::get('login/admin', 'showAdminLoginForm')->name('auth.admin_form');
    Route::get('login/supir', 'showSupirLoginForm')->name('auth.supir_form');
    Route::get('login/pembuat_peti', 'showPembuatPetiLoginForm')->name('auth.pembuat_peti_form');
    Route::post('login/user/auth', 'penggunaLogin')->name('auth.pengguna_login');
    Route::post('login/admin/auth', 'adminLogin')->name('auth.admin_login');
    Route::post('login/supir/auth', 'supirLogin')->name('auth.supir_login');
    Route::post('login/pembuat_peti/auth', 'pembuatPetiLogin')->name('auth.pembuat_peti_login');
    Route::get('logout', 'logout')->name('auth.logout');
    //Route Register
    Route::get('register/user', 'showPenggunaRegisterForm')->name('auth.pengguna_register_form');
    Route::get('register/supir', 'showSupirRegisterForm')->name('auth.supir_register_form');
    Route::post('register/user/post', 'penggunaRegister')->name('auth.pengguna_register');
    Route::post('register/supir/post', 'supirRegister')->name('auth.supir_register');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('admin/dashboard', 'dashboard')->name('admin.home')->middleware(['auth:admin']);
});

Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    Route::resource('pengguna', PenggunaController::class);
    Route::resource('supir', SupirController::class);
    Route::resource('ambulance', AmbulanceController::class);
    Route::resource('peti', PetiController::class);
    Route::controller(PemesananController::class)->prefix('pemesanan')->group(function () {
        Route::get('/', 'index')->name('pemesanan.index');
        Route::get('/edit/{id}', 'edit')->name('pemesanan.edit');
        Route::post('/update', 'update')->name('pemesanan.update');
    });
});
Route::middleware(['auth:pengguna'])->group(function () {
    Route::controller(PagesController::class)->group(function () {
        Route::get('user/dashboard', 'dashboard')->name('pengguna.home');
        Route::get('user/ambulance', 'ambulance')->name('page.ambulance');
        Route::get('user/riwayat', 'riwayat')->name('page.riwayat');
    });
    Route::controller(PemesananController::class)->group(function () {
        Route::get('user/pemesanan', 'create')->name('pemesanan.create');
        Route::post('user/pemesanan/create', 'store')->name('pemesanan.store');
    });
});
Route::middleware(['auth:supir,pembuat_peti'])->group(function () {
    Route::controller(PemesananController::class)->group(function () {
        Route::post('supir/update', 'terima')->name('pemesanan.terima');
    });
});
Route::middleware(['auth:supir'])->group(function () {
    Route::controller(PagesController::class)->group(function () {
        Route::get('supir/dashboard', 'dashboardSupir')->name('supir.home');
    });
});
Route::middleware(['auth:pembuat_peti'])->group(function () {
    Route::controller(PagesController::class)->group(function () {
        Route::get('pembuat_peti/dashboard', 'dashboardPembuatPeti')->name('pembuat_peti.home');
    });
});
