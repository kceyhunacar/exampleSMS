<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\SmsController;
use App\Models\Sms;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

 
Route::middleware(['auth:api'])->group(
    function () {

        Route::prefix('sms')->group(
            function () {

                // Sms
                Route::post('/sendSms', [SmsController::class, 'sendSms'])->name('api.sms.send');
                Route::get('/getSmsByFilter', [SmsController::class, 'getSmsByFilter']);
                Route::get('/getSmsById', [SmsController::class, 'getSmsById']);
            }
        );
    }
);


Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});
