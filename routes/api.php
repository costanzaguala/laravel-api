<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// API
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\ContactController;



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

Route::name('api.')->group(function() {
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });


    Route::resource('projects', ProjectController::class)->only([
        'index',
        'show'
    ]);

    Route::resource('/contacts', ContactController::class)->only([
        'store',
    ]);

});