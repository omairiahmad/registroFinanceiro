<?php

use App\Http\Controllers\Api\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//Route::post('/transaction/{clientId}', [ClientController::class, 'transaction']);
//Route::get('/statement/{clientId}', [ClientController::class, 'statement']);

//Route::post('/client', [AuthController::class, 'login'], );


