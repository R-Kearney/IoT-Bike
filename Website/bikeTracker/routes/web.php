<?php

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
    return view('welcome');
})->name('welcome');



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

// Must be logged in to view these routes
Route::middleware(['auth'])->group(function () {
    Route::get('/home', array(
       'uses' => 'Bike@view'
   ))->name('home');

    Route::get('/timeline', array(
      'uses' => 'Bike@timeline'
  ))->name('timeline');

    Route::put('/updateBike', array(
    'uses' => 'Bike@update'
   ));

    Route::get('/editBike', array(
       'uses' => 'Bike@edit'
   ))->name('editBike');
});

Route::put('/updateBikeLocation', array(
'uses' => 'Tracker@updateLocation'
));

Route::get('/testUpdateBL', function () {
    return view('testUpdateBL');
})->name('testUpdateBL');
