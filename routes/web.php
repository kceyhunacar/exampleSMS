<?php

use App\Http\Controllers\Backend\AdminsController;
use App\Http\Controllers\Backend\Auth\LoginController;
 use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SmsController;
use App\Http\Controllers\Backend\UsersController;
 use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [HomeController::class, 'redirectAdmin'])->name('index');
Route::get('/home', [HomeController::class, 'index'])->name('home');

/**
 * Admin routes
 */
Route::group(['prefix' => 'admin'], function () {

  
  
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    // Route::resource('roles', RolesController::class, ['names' => 'admin.roles']);
    Route::resource('users', UsersController::class, ['names' => 'admin.users']);
    Route::resource('admins', AdminsController::class, ['names' => 'admin.admins']);

    Route::resource('sms', SmsController::class, ['names' => 'admin.sms']);
    Route::get('/sms/delete/{id?}', [SmsController::class, 'delete'])->name('admin.sms.delete');

    // Login Routes
    Route::get('/login',  [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login/submit', [LoginController::class, 'login'])->name('admin.login.submit');

    // Logout Routes
    Route::post('/logout/submit',  [LoginController::class, 'logout'])->name('admin.logout.submit');

    // Forget Password Routes
    Route::get('/password/reset',  [ForgetPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
    Route::post('/password/reset/submit', [ForgetPasswordController::class, 'reset'])->name('admin.password.update');
});
