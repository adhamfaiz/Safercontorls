<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddhotelController;
use App\Http\Controllers\TouristPlacesController;
use App\Http\Controllers\MontionTouristPlacesController;
use App\Http\Controllers\PopularController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DetelshotelController;
use App\Http\Controllers\DetelsArtisanController;
use App\Http\Controllers\DetelsTouristPlacesController;
use App\Http\Controllers\DetelsPopulerController;
use App\Http\Controllers\CarsModController;
use App\Http\Controllers\BookingHotelController;
use App\Http\Controllers\BookingCarController;
Route::get('/torest', [TouristPlacesController::class, 'torest']);
Route::get('/montion', [MontionTouristPlacesController::class, 'montion']);
Route::get('/set', [AddhotelController::class, 'set']);
Route::post('/bookings', [BookingHotelController::class, 'store']);
Route::post('/booking', [BookingCarController::class, 'store']);
Route::get('/populr', [PopularController::class, 'populr']);
Route::get('/car', [CarController::class, 'car']);
Route::get('/hotels/{hotelId}/hoteldetels', [DetelshotelController::class, 'hoteldetels']);
Route::get('/hotels/{hotelId}/carmode', [CarsModController::class, 'carmode']);
Route::get('/hotels/{hotelId}/artisan', [DetelsArtisanController::class, 'artisan']);
Route::get('/hotels/{hotelId}/TouristPlaces', [DetelsTouristPlacesController::class, 'detelsTouristPlaces']);
Route::get('/hotels/{hotelId}/populer', [DetelsPopulerController::class, 'populer']);