<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ExamController;
use App\Http\Controllers\Api\V1\PackageController;
use App\Http\Middleware\EnsureTokenIsValid;

Route::middleware([EnsureTokenIsValid::class])->prefix('v1')->group(function () {
    Route::get('exams', [ExamController::class, 'index']);
    Route::post('exams', [ExamController::class, 'store']);

    Route::get('packages', [PackageController::class, 'index']);
    Route::post('packages', [PackageController::class, 'store']);
});
