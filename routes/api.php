<?php

use App\Http\Controllers\Api\V1\ExamController;
use App\Http\Controllers\Api\V1\PackageController;
use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Support\Facades\Route;

Route::middleware([EnsureTokenIsValid::class])->prefix('v1')->group(function () {

    Route::prefix('exams')->group(function () {
        Route::get('/', [ExamController::class, 'index']);
        Route::post('/', [ExamController::class, 'store']);
        Route::post('/bulk', [ExamController::class, 'bulkStore']);
    });

    Route::prefix('packages')->group(function () {
        Route::get('/', [PackageController::class, 'index']);
        Route::post('/', [PackageController::class, 'store']);
        Route::post('/pdf', [PackageController::class, 'generatePdf']);
    });

});
