<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerLoanController;
use App\Http\Controllers\CustomerAccountController;
use App\Http\Controllers\PaymentScheduleController;
use App\Http\Controllers\UserProfileController;

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
})->name('home')->middleware('auth');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');
Route::get('/profile', [UserProfileController::class, 'profile'])->name('user.profile')->middleware('auth');
Route::post('/profile', [UserProfileController::class, 'update'])->name('user.profile.update')->middleware('auth');

Route::resource('customers', CustomerController::class)->middleware('auth');

Route::resource('loans', LoanController::class)->middleware('auth');

Route::resource('customers-loans', CustomerLoanController::class)->middleware('auth');

Route::get('payment-schedule', [PaymentScheduleController::class, 'index'])->middleware('auth');

Route::resource('customers/{customer}/accounts', CustomerAccountController::class)->middleware('auth');
