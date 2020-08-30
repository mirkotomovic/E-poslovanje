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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/searchForm', 'PagesController@index')->name('searchForm');
Route::get('/search', 'SearchController@search')->name('search');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/contact','PagesController@contacts')->name('contacts');

Route::post('/tickets/store', 'TicketController@store')->name('tickets.store');

Auth::routes();

Route::resource('users', 'UserController');



Route::group(['middleware' => 'auth'], function () {
    Route::middleware('can:isAdmin')->group(function () {
        Route::get('/admin/places', 'PlaceController@index')->name('places.index');
        Route::get('/admin/places/create', 'PlaceController@create')->name('places.create');
        Route::post('/admin/places/store', 'PlaceController@store')->name('places.store');
        Route::get('/admin/places/{place}/edit', 'PlaceController@edit')->name('places.edit');
        Route::patch('/admin/places/{place}', 'PlaceController@update')->name('places.update');
        Route::delete('/admin/places/{place}', 'PlaceController@destroy')->name('places.destroy');

        Route::get('/admin/paths', 'PathController@index')->name('paths.index');
        Route::get('/admin/paths/create', 'PathController@create')->name('paths.create');
        Route::post('/admin/paths/store', 'PathController@store')->name('paths.store');
        Route::delete('/admin/paths/{path}', 'PathController@destroy')->name('paths.destroy');

        Route::get('/admin/companies', 'CompanyController@index')->name('companies.index');
        Route::get('/admin/companies/create', 'CompanyController@create')->name('companies.create');
        Route::post('/admin/companies/store', 'CompanyController@store')->name('companies.store');
        Route::get('/admin/companies/{company}/edit', 'CompanyController@edit')->name('companies.edit');
        Route::patch('/admin/companies/{company}', 'CompanyController@update')->name('companies.update');
        Route::delete('/admin/companies/{company}', 'CompanyController@destroy')->name('companies.destroy');

        Route::get('/admin/journeys', 'JourneyController@index')->name('journeys.index');
        Route::get('/admin/journeys/create', 'JourneyController@create')->name('journeys.create');
        Route::post('/admin/journeys/store', 'JourneyController@store')->name('journeys.store');
        Route::delete('/admin/journeys/{journey}', 'JourneyController@destroy')->name('journeys.destroy');


    });
    Route::middleware('can:isSalesman')->group(function () {
        
    });
    Route::middleware('can:isCustomer')->group(function () {
        
    });
});
