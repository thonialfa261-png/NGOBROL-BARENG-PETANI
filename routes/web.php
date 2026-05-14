<?php

use App\Http\Controllers\Admin\KecamatanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ChannelController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});
    // Router Admin Bagian Dasboard //
Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
    // Router Admin Bagian Kecamatan //
Route::get('/admin/kecamatan', [KecamatanController::class, 'index'])->name('admin.kecamatan.index');
Route::get('/admin/kecamatan/create', [KecamatanController::class, 'create'])->name('admin.kecamatan.create');
Route::post('/admin/kecamatan', [KecamatanController::class, 'store'])->name('admin.kecamatan.store');

Route::get('/admin/kecamatan/{id}/edit', [KecamatanController::class, 'edit'])->name('admin.kecamatan.edit');
Route::put('/admin/kecamatan/{id}', [KecamatanController::class, 'update'])->name('admin.kecamatan.update');
Route::delete('/admin/kecamatan/{id}', [KecamatanController::class, 'destroy'])->name('admin.kecamatan.destroy');

   // Router Admin Bagian Channel //
Route::get('/admin/channel', [ChannelController::class, 'index'])->name('admin.channel.index');
Route::get('/admin/channel/create', [ChannelController::class, 'create'])->name('admin.channel.create');
Route::post('/admin/channel', [ChannelController::class, 'store'])->name('admin.channel.store');

Route::get('/admin/channel/{id}/edit', [ChannelController::class, 'edit'])->name('admin.channel.edit');
Route::put('/admin/channel/{id}', [ChannelController::class, 'update'])->name('admin.channel.update');
Route::delete('/admin/channel/{id}', [ChannelController::class, 'destroy'])->name('admin.channel.destroy');

    // Router Admin bagian Data User //
Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user.index');
Route::get('/admin/user/create', [UserController::class, 'create'])->name('admin.user.create');
Route::post('/admin/user', [UserController::class, 'store'])->name('admin.user.store');
Route::delete('/admin/user/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');
