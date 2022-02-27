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

Route::middleware(['middleware' => 'auth:api', 'cors'], function () {

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
    Route::post('/GPU', [GPUController::class, 'store']);
    Route::patch('/GPU/{id}', [GPUController::class, 'update']);
    Route::delete('/GPU/{id}', [GPUController::class, 'destroy']);

    // HDD
    Route::post('/HDD', [HDDController::class, 'store']);
    Route::patch('/HDD/{id}', [HDDController::class, 'update']);
    Route::delete('/HDD/{id}', [HDDController::class, 'destroy']);

    // MotherBoard
    Route::post('/MotherBoard', [MotherBoardController::class, 'store']);
    Route::patch('/MotherBoard/{id}', [MotherBoardController::class, 'update']);
    Route::delete('/MotherBoard/{id}', [MotherBoardController::class, 'destroy']);

    // PSU
    Route::post('/PSU', [PSUController::class, 'store']);
    Route::patch('/PSU/{id}', [PSUController::class, 'update']);
    Route::delete('/PSU/{id}', [PSUController::class, 'destroy']);

    // RAM
    Route::post('/RAM', [RAMController::class, 'store']);
    Route::patch('/RAM/{id}', [RAMController::class, 'update']);
    Route::delete('/RAM/{id}', [RAMController::class, 'destroy']);

    // SSD
    Route::post('/SSD', [SSDController::class, 'store']);
    Route::patch('/SSD/{id}', [SSDController::class, 'update']);
    Route::delete('/SSD/{id}', [SSDController::class, 'destroy']);

});
