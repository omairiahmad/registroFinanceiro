<?php

use App\Http\Controllers\Api\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



Route::post('/transaction/{clientId}', [ClientController::class, 'transaction'])->middleware('auth:sanctum');
Route::get('/statement/{clientId}', [ClientController::class, 'statement'])->middleware('auth:sanctum');;
Route::post('/', [AuthController::class, 'login']);
