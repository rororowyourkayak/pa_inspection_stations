<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

use App\Http\Controllers\StationController;
use App\Http\Controllers\CountyController;
use App\Http\Controllers\CityController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(MainController::class)->group(function(){
    Route::get('/', 'viewHomePage');
});

Route::controller(StationController::class)->group(function(){
    Route::get('/stations', 'viewStations');
    Route::get('/stations/{station}', 'viewStation');

    Route::get('/counties', 'viewCounties');
    Route::get('/counties/{county}', 'viewCounty');

    Route::get('/cities', 'viewCities');
    Route::get('/cities/{city}', 'viewCity');
});
