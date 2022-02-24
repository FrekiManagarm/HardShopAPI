<?php

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

// Case
Route::get('');

// Config

// Cooling

// CPU

// GPU

// HDD

// MotherBoard

// PSU

// RAM

// SSD

Route::middleware(['middleware' => 'auth:api', 'cors'], function () {

    // Auth
    Route::post('/logout');

    // Case

    // Config

    // Cooling

    // CPU

    // GPU

    // HDD

    // MotherBoard

    // PSU

    // RAM

    // SSD

});
