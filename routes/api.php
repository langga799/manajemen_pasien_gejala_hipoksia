<?php

use App\Http\Controllers\Api\ApiForgotPasswordController;
use App\Http\Controllers\Api\PatientAuthApiController;
use App\Http\Controllers\Api\PatientMonitoringController;
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
     * * Route autentikasi pasien
     */
    Route::post('/register', [PatientAuthApiController::class, 'register']);
    Route::post('/login', [PatientAuthApiController::class, 'login']);
    Route::post('/logout', [PatientAuthApiController::class, 'logout']);
    Route::post('/forgot-password', [ApiForgotPasswordController::class, 'forgotPassword']);
    Route::post('/reset-password', [ApiForgotPasswordController::class, 'resetPassword']);

    Route::group(['middleware' => 'auth:patientapi'], function(){
        Route::post('/update', [PatientProfileController::class, 'update']);
        Route::post('/add-profile-photo', [PatientProfileController::class, 'saveUserProfile']);
        Route::post('/user-profile', [PatientProfileController::class, 'getUserPhoto']);

        
        /**
         * * Route monitoring pasien
         * TODO: buat route untuk monitoring pasien
         */
        Route::post('/insert-sensor', [PatientMonitoringController::class, 'insert']);



        /**
         * * Route geolokasi pasien
         * TODO: buat route untuk geolokasi pasien
         */

        /**
         * * Route rekam medis pasien
         * TODO: buat route untuk rekam medis pasien
         */
    });
});





