<?php

use App\Http\Controllers\Api\PasienController;
use Illuminate\Http\Request;
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

Route::post('/register', [PasienController::class, 'register']);
Route::post('/login', [PasienController::class, 'login']);
Route::post('/logout', [PasienController::class, 'logout']);

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('/update', [PasienController::class, 'update']);
    Route::post('/add-profile-photo', [PasienController::class, 'saveUserProfile']);
});


Route::get('/get-tokens', [PasienController::class, 'getAllAccessToken']);
