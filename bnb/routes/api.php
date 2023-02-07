<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('bookables', '\App\Http\Controllers\Api\BookableController')
    ->only('index', 'show');
Route::post('bookables/{bookable}/availability', '\App\Http\Controllers\Api\BookableAvailabilityController')
    ->name('bookables.availability.show');
Route::get('bookables/{bookable}/review', '\App\Http\Controllers\Api\BookableReviewController')
    ->name('bookable.reviews.index');
    Route::get('/booking-by-review/{reviewKey}', '\App\Http\Controllers\Api\BookingByReviewController')
    ->name('booking.by-review.show');
Route::apiResource('reviews', '\App\Http\Controllers\Api\ReviewController')
    ->only(['show', 'store']);


