<?php

use App\Http\Controllers\API;
use Illuminate\Support\Facades\Route;

Route::middleware('token.check')->group(function () {
    Route::get('vacancy-list', [API\JobPosting\JobPostingAPIController::class, 'index']);
    Route::post('application/store', [API\Application\ApplicationAPIController::class, 'store']);
    Route::post('application/check', [API\Application\ApplicationAPIController::class, 'checkApplication']);
});
