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


Route::prefix('client')->middleware('auth')->group(function() {
    Route::resource('all-clients', 'ClientController');
    Route::resource('addresses', 'AddressesController');
    Route::get('search-clients/{search_query}', 'AddressesController@searchClients')->name('client-search.email');
    Route::get('cities/{country_id}', 'AddressesController@getCountryCities')->name('country-cities.get');
    Route::get('areas/{city_id}', 'AddressesController@getCityAreas')->name('city-areas.get');
});
