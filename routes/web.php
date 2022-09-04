<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/set-cookie/{cookie}', [AdminController::class, 'setCookie'])->name('setCookie');

//Profile
Route::get('/profile', \App\Http\Livewire\Admin\UserProfile::class)->name('admin.profile');
Route::post('/changeData', [AdminController::class, 'data'])->name('admin.data');
Route::get('/password/index', [AdminController::class, 'password'])->name('admin.profile.password');
Route::post('/password/index', [AdminController::class, 'passwordChange'])->name('admin.password.change.index');
