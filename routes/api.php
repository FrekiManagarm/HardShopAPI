<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\CoolingController;
use App\Http\Controllers\CPUController;
use App\Http\Controllers\GPUController;
use App\Http\Controllers\HDDController;
use App\Http\Controllers\MotherBoardController;
use App\Http\Controllers\PSUController;
use App\Http\Controllers\RAMController;
use App\Http\Controllers\SSDController;
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

// Auth
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Case
Route::get('/Cases', [CaseController::class, 'index']);
Route::get('/Case/{id}', [CaseController::class, 'show']);

// Config
Route::get('/Configs', [ConfigController::class, 'index']);
Route::get('/Config/{id}', [ConfigController::class, 'show']);

// Cooling
Route::get('/Coolings', [CoolingController::class, 'index']);
Route::get('/Cooling/{id}', [CoolingController::class, 'show']);

// CPU
Route::get('/CPUs', [CPUController::class, 'index']);
Route::get('/CPU/{id}', [CPUController::class, 'show']);

// GPU
Route::get('/GPUs', [GPUController::class, 'index']);
Route::get('/GPU/{id}', [GPUController::class, 'show']);

// HDD
Route::get('/HDDs', [HDDController::class, 'index']);
Route::get('/HDD/{id}', [HDDController::class, 'show']);

// MotherBoard
Route::get('/MotherBoards', [MotherBoardController::class, 'index']);
Route::get('/MotherBoard/{id}', [MotherBoardController::class, 'show']);

// PSU
Route::get('/PSUs', [PSUController::class, 'index']);
Route::get('/PSU/{id}', [PSUController::class, 'show']);

// RAM
Route::get('/RAMs', [RAMController::class, 'index']);
Route::get('/RAM/{id}', [RAMController::class, 'show']);

// SSD
Route::get('/SSDs', [SSDController::class, 'index']);
Route::get('/SSD/{id}', [SSDController::class, 'show']);

Route::middleware(['middleware' => 'auth:api'], function () {

    // Auth
    Route::post('/logout');

    // Case
    Route::post('/Case', [CaseController::class, 'store']);
    Route::patch('/Case/{id}', [CaseController::class, 'update']);
    Route::delete('/Case/{id}', [CaseController::class, 'destroy']);

    // Config
    Route::post('/Config', [ConfigController::class, 'store']);
    Route::patch('/Config/{id}', [ConfigController::class, 'update']);
    Route::delete('Config/{id}', [ConfigController::class, 'destroy']);

    // Cooling
    Route::post('/Cooling', [CoolingController::class, 'store']);
    Route::patch('/Cooling/{id}', [CoolingController::class, 'update']);
    Route::delete('/Cooling/{id}', [CoolingController::class, 'destroy']);

    // CPU
    Route::post('/CPU', [CPUController::class, 'store']);
    Route::patch('/CPU/{id}', [CPUController::class, 'update']);
    Route::delete('/CPU/{id}', [CPUController::class, 'destroy']);

    // GPU
    Route::post('/GPU', 'GPUController@store');
    Route::patch('/GPU/{id}', 'GPUController@update');
    Route::delete('/GPU/{id}', 'GPUController@destroy');

    // HDD
    Route::post('/HDD', 'HDDController@store');
    Route::patch('/HDD/{id}', 'HDDController@update');
    Route::delete('/HDD/{id}', 'HDDController@destroy');

    // MotherBoard
    Route::post('/MotherBoard', 'MotherBoardController@store');
    Route::patch('/MotherBoard/{id}', 'MotherBoardController@update');
    Route::delete('/MotherBoard/{id}', 'MotherBoardController@destroy');

    // PSU
    Route::post('/PSU', 'PSUController@store');
    Route::patch('/PSU/{id}', 'PSUController@update');
    Route::delete('/PSU/{id}', 'PSUController@destroy');

    // RAM
    Route::post('/RAM', 'RAMController@store');
    Route::patch('/RAM/{id}', 'RAMController@update');
    Route::delete('/RAM/{id}', 'RAMController@destroy');

    // SSD
    Route::post('/SSD', 'SSDController@store');
    Route::patch('/SSD/{id}', 'SSDController@update');
    Route::delete('/SSD/{id}', 'SSDController@destroy');

});
