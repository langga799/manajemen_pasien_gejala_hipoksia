<?php

use App\Http\Controllers\Api\ApiForgotPasswordController;
use App\Http\Controllers\Api\PatientAuthApiController;
use App\Http\Controllers\Api\PatientProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('patient')->group(function(){
    
    /**
     * * Route yang ditujukan untuk autententikasi pasien
     */
    Route::post('/register', [PatientAuthApiController::class, 'register']);
    Route::post('/login', [PatientAuthApiController::class, 'login']);
    Route::post('/logout', [PatientAuthApiController::class, 'logout']);
    Route::post('/forgot-password', [ApiForgotPasswordController::class, 'forgotPassword']);
    Route::post('/reset-password', [ApiForgotPasswordController::class, 'resetPassword']);

    Route::group(['middleware' => 'auth:patientapi'], function(){
        Route::post('/update', [PatientProfileController::class, 'update']);
        Route::post('/add-profile-photo', [PatientProfileController::class, 'saveUserProfile']);
    });
});





