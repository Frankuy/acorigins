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

//Route For LOGIN
Route::get('login', function() {
    return view('login');
});
Route::post('login', 'ChecksController@login');

Route::get('register', function() {
    return view('register');
});
Route::post('register', 'ChecksController@register');

Route::get('logout', function() {
    Cookie::queue('user_id', '', -9999);
    Cookie::queue('key', '', -9999);
    return redirect('/login');
});

Route::redirect('/', 'weapons/melee', 301);
Route::redirect('/weapons', 'weapons/melee', 301);

Route::group(['middleware' => 'admin'], function () {
    //ROUTES FOR WEAPONS
    Route::get('weapons/{type}', 'WeaponsController@index')->name('weapons');
    Route::get('table/weapons/{type}/{query?}', 'WeaponsController@showTable');

    //ROUTES FOR OUTFITS
    Route::get('outfits', 'OutfitsController@index')->name('outfits');
    Route::get('table/outfits/{query?}', 'OutfitsController@showTable');

    //ROUTES FOR MOUNTS
    Route::get('mounts', 'MountsController@index')->name('mounts');
    Route::get('table/mounts/{query?}', 'MountsController@showTable');

    //ROUTE CHECK OWNED
    Route::get('check/{id}', 'ChecksController@index');

    //ROUTE FOR PROGRESS
    Route::get('progress', 'ProgressController@index');
});

//404 Not Found
Route::fallback(function() {
    return '404 Not Found';
});