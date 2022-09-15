<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OtpController;

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
// Route::get('/', function () {
//     return view('achat');
// });
Route::get('/test/purchase', [OtpController::class,'confirmationPage']);
Route::post('/test/otp-request', [OtpController::class,'requestForOtp'])->name('requestForOtp');
Route::post('/test/otp-validate', [OtpController::class,'validateOtp'])->name('validateOtp');
Route::post('/test/otp-resend', [OtpController::class,'resendOtp'])->name('resendOtp');
// Route::post('/test/otp-request', 'OtpController@requestForOtp')->name('requestForOtp');
// Route::post('/test/otp-validate', 'OtpController@validateOtp')->name('validateOtp');
// Route::post('/test/otp-resend', 'OtpController@resendOtp')->name('resendOtp');
