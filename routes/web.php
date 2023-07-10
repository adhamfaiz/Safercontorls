<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('addhotel', 'App\Http\Controllers\AddhotelController');
Route::get('/create', [App\Http\Controllers\AddhotelController::class, 'create'])->name('create');
Route::resource('showDetelshotel', 'App\Http\Controllers\DetelshotelController');
Route::get('/updates/{id}', 'App\Http\Controllers\DetelshotelController@edit');
Route::get('/create', [App\Http\Controllers\DetelshotelController::class, 'create'])->name('create');
Route::get('/create', [App\Http\Controllers\CarsModController::class, 'create'])->name('create');
Route::resource('detelsTouristPlaces', 'App\Http\Controllers\DetelsTouristPlacesController');
Route::resource('Booking', 'App\Http\Controllers\BookingHotelController');
Route::resource('Bookingcar', 'App\Http\Controllers\BookingCarController');
Route::resource('Popular', 'App\Http\Controllers\PopularController');
Route::resource('detels_populer', 'App\Http\Controllers\DetelsPopulerController');
Route::resource('montionTouristPlaces', 'App\Http\Controllers\MontionTouristPlacesController');
Route::resource('detels_artisan', 'App\Http\Controllers\DetelsArtisanController');
Route::resource('addhotel', 'App\Http\Controllers\AddhotelController');
Route::resource('Car', 'App\Http\Controllers\CarController');
Route::resource('Cars_mod', 'App\Http\Controllers\CarsModController');
Route::resource('TouristPlaces', 'App\Http\Controllers\TouristPlacesController');
Route::resource('car_Detels', 'App\Http\Controllers\CarDetelsController');
Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles','App\Http\Controllers\RoleController');
    
    Route::resource('users','App\Http\Controllers\UserController');
    
    });
Route::get('/{page}', 'App\Http\Controllers\AdminController@index');
Auth::routes();

