<?php

use App\Http\Controllers\Api\Device\PulseOximetryController;
use App\Http\Controllers\Api\Patient\ApiForgotPasswordController;
use App\Http\Controllers\Api\Patient\PatientAuthApiController;
use App\Http\Controllers\Api\Patient\PatientDeviceController;
use App\Http\Controllers\Api\Patient\PatientProfileController;
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
    
    Route::post('/register', [PatientAuthApiController::class, 'register']);
    Route::post('/login', [PatientAuthApiController::class, 'login']);
    Route::post('/logout', [PatientAuthApiController::class, 'logout']);
    Route::post('/forgot-password', [ApiForgotPasswordController::class, 'forgotPassword']);
    Route::post('/reset-password', [ApiForgotPasswordController::class, 'resetPassword']);

    Route::group(['middleware' => 'auth:patientapi'], function(){
        Route::post('/update', [PatientProfileController::class, 'update']);
        Route::post('/add-profile-photo', [PatientProfileController::class, 'saveUserProfile']);
        Route::post('/user-profile', [PatientProfileController::class, 'getUserPhoto']);

        

        Route::prefix('hardware')->group(function(){
            Route::post('/create', [PatientDeviceController::class, 'savePatientDevice']);
            Route::post('/enable', [PatientDeviceController::class, 'enableDevice']);
            Route::post('/disable', [PatientDeviceController::class, 'disableDevice']);
        });



        Route::prefix('monitoring')->group(function(){

        });
        


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


/**
 * * Route Device
 */
Route::prefix('oximetry')->group(function(){
    Route::post('/insert', [PulseOximetryController::class, 'storeDataSensor']);
    Route::get('/data', [PulseOximetryController::class, 'getDataSensor']);
});





