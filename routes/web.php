<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BasicInfoController;
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

//Jetstream
Route::middleware([
    'auth:sanctum',
    'admin',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//Cookies
Route::get('/set-cookie/{cookie}', [AdminController::class, 'setCookie'])->name('setCookie')->middleware('auth');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
//Dashboard
    Route::get('/', [AdminController::class, 'index'])->name('index');
//Profile
    Route::get('/profile', \App\Http\Livewire\Admin\UserProfile::class)->name('profile');
    Route::post('/changeData', [AdminController::class, 'data'])->name('data');
    Route::get('/password/index', [AdminController::class, 'password'])->name('profile.password');
    Route::post('/password/index', [AdminController::class, 'passwordChange'])->name('password.change.index');
//BasicInfo
    Route::get('/info', [BasicInfoController::class, 'index'])->name('info.index');
    Route::post('/info/store', [BasicInfoController::class, 'store'])->name('info.store');
    Route::post('/info/avatar-store', [BasicInfoController::class, 'avatarStore'])->name('info.avatar.store');
    Route::post('/info/cv-store', [BasicInfoController::class, 'cvStore'])->name('info.cv.store');
});
