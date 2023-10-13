<?php

use App\Http\Controllers\ContractController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('users', UserController::class);
Route::apiResource('dosens', DosenController::class);
Route::apiResource('majors', MajorController::class);
Route::apiResource('studies', StudyController::class);
Route::apiResource('contracts', ContractController::class);