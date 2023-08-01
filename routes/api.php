<?php

use Illuminate\Support\Facades\Route;

Route::group(['name' => 'api'], function () {
    Route::get('/photo/{id}', [App\Http\Controllers\Api\PhotoController::class, 'show']);
    Route::get('/photo', [App\Http\Controllers\Api\PhotoController::class, 'index']);
    Route::get('/video/{id}', [App\Http\Controllers\Api\VideoController::class, 'show']);
    Route::get('/video', [App\Http\Controllers\Api\VideoController::class, 'index']);
    Route::get('/project/{id}', [App\Http\Controllers\Api\ProjectController::class, 'show']);
    Route::get('/project', [App\Http\Controllers\Api\ProjectController::class, 'index']);
    Route::get('/product/{id}', [App\Http\Controllers\Api\ProductController::class, 'show']);
    Route::get('/product', [App\Http\Controllers\Api\ProductController::class, 'index']);
    Route::get('/partner/{id}', [App\Http\Controllers\Api\PartnerController::class, 'show']);
    Route::get('/partner', [App\Http\Controllers\Api\PartnerController::class, 'index']);
    Route::get('/service/{id}', [App\Http\Controllers\Api\ServiceController::class, 'show']);
    Route::get('/service', [App\Http\Controllers\Api\ServiceController::class, 'index']);
    Route::get('/about/{id}', [App\Http\Controllers\Api\AboutController::class, 'show']);
    Route::get('/about', [App\Http\Controllers\Api\AboutController::class, 'index']);
    Route::get('/slider/{id}', [App\Http\Controllers\Api\SliderController::class, 'show']);
    Route::get('/slider', [App\Http\Controllers\Api\SliderController::class, 'index']);
    Route::get('/sertificate/{id}', [App\Http\Controllers\Api\SertificateController::class, 'show']);
    Route::get('/sertificate', [App\Http\Controllers\Api\SertificateController::class, 'index']);
    Route::get('/settings', function () {
        return App\Models\Setting::all();
    });
});
