<?php

use App\Models\User;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\PengaduanController;
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





Route::middleware('guest')->group(function () {
  Route::get('/', function () {
    return view('guest.index');
  });
  Route::get('/auth/login', [AuthController::class, 'login_page'])->name('login');
  Route::post('/auth/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
  // Route::get('/admin/dashboard', [DashboardController::class, 'index']);
  Route::get('/dashboard', function () {
    return view('auth.dashboard.index', [
      'pengaduan' => Pengaduan::orderBy('created_at', 'desc')->get(),
      'pengaduan_limit' => Pengaduan::where('status', 'Menunggu konfirmasi')->orderBy('created_at', 'desc')->limit(5)->get(),
      'users' => User::where('level', 'user')->get()->count(),
    ]);
  });

  Route::get('/pengaduan-saya', [PengaduanController::class, 'index2']);
  Route::resource('/pengaduan', PengaduanController::class);
  Route::put('/pengaduan/{pengaduan:no_pengaduan}/selesai', [PengaduanController::class, 'updateStatus']);
  Route::resource('/users', UserController::class);

  Route::resource('/gedung', GedungController::class);

  Route::post('/auth/logout', [AuthController::class, 'logout']);
});
