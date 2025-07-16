<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/dashboard', App\Http\Controllers\Admin\DashboardController::class)->name('admin.dashboard');
        Route::resource('/school', \App\Http\Controllers\Admin\SchoolController::class, ['as' => 'admin']);
        Route::resource('/students', \App\Http\Controllers\Admin\StudentController::class, ['as' => 'admin']);
        Route::resource('/users', \App\Http\Controllers\Admin\UserController::class, ['as' => 'admin']);
        Route::resource('/attendance_types', \App\Http\Controllers\Admin\AttendanceTypeController::class, ['as' => 'admin']);
        Route::resource('/attendances', \App\Http\Controllers\Admin\AttendanceController::class, ['as' => 'admin']);
    });
});
