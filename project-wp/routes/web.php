<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\BobotController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\ResetPasswordController;


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

Route::get('/', [berandaController::class, 'index'])->name('beranda');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/alternatif', [AlternatifController::class, 'index'])->name('alternatif');
Route::post('/alternatif', [AlternatifController::class, 'store'])->name('alternatif.store');
Route::delete('/alternatif', [AlternatifController::class, 'destroyAll'])->name('alternatif.destroyAll');

Route::get('/bobot', [BobotController::class, 'index'])->name('bobot');
Route::post('/bobot/store', [BobotController::class, 'store'])->name('bobot.store');

Route::get('/hasil', [HasilController::class, 'index'])->name('hasil');

// Route::get('/', function () {
//     return view('welcome');
// });
