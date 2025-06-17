<?php

use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SchoolController;
use App\Http\Controllers\Api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/school', [SchoolController::class, 'show'])->middleware('auth:sanctum');
Route::post('/presence', [AttendanceController::class, 'presence'])->middleware('auth:sanctum');
Route::post('/add-student', [StudentController::class, 'addStudent'])->middleware('auth:sanctum');
