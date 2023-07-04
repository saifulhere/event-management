<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\Passwords\PasswordController;
use App\Http\Controllers\Auth\Passwords\ResetPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UserRegistrationController;
use App\Http\Controllers\Auth\Verification\VerificationController;
use App\Http\Controllers\FrontEnd\AboutController;
use App\Http\Controllers\Frontend\HeroSectionController;
use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\Auth\UserLoginController;
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
//FRONTEND ROUTES
Route::get('/', [HomeController::class, 'index'])->name('home');

//DASHBOARD ROUTE
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

//REGISTRATION & LOGIN ROUTE
Route::get('/admin/register', [RegisterController::class, 'index'])->name('admin.register');
Route::post('/admin/register', [RegisterController::class, 'store'])->name('admin.store');
Route::get('/admin/login', [LoginController::class, 'index'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'store']);
Route::post('/admin/logout', [LogoutController::class, 'logout'])->name('logout');

//USER REGISTRATION ROUTE
Route::get('/signup', [UserRegistrationController::class, 'index'])->name('signup');
Route::post('/signup', [UserRegistrationController::class, 'store']);
Route::get('/login', [UserLoginController::class, 'index'])->name('login');
Route::post('/login', [UserLoginController::class, 'store']);


//EMAIL VERIFICATION ROUTE
Route::get('/email/verify', [VerificationController::class, 'index'])->name('verification.notice');
Route::get('email/verify/{id}', [VerificationController::class, 'store'])->name('verification.verify');
Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');


//PASSWORD RESET ROUTES
Route::get('/password/forgot-password', [PasswordController::class, 'index'])->name('password.request');
Route::post('/password/forgot-password',[PasswordController::class, 'store'] )->name('password.email');
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'index'])->name('password.reset');
Route::post('/passord/reset', [ResetPasswordController::class, 'store'])->name('password.update');


//HERO SECTION MANAGEMENT
Route::group(['prefix' => 'admin'], function(){
    Route::get('/hero-section', [HeroSectionController::class, 'index'])->name('hero');
    Route::post('/hero-section', [HeroSectionController::class, 'store']);
    Route::post('/hero-section/update', [HeroSectionController::class, 'update'])->name('update.hero');
    Route::get('/about-events', [AboutController::class, 'index'] )->name('about');
    Route::post('/about-events', [AboutController::class, 'store'])->name('about.store');
    Route::post('/about-events/update', [AboutController::class, 'update'])->name('about.update');

    Route::get('/events/feature/{id}', [AboutController::class, 'feature'])->name('features.destroy');
});
