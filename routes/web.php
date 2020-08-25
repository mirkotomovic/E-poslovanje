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

Auth::routes();

Route::resource('users', 'UserController');

Route::group(['middleware' => 'auth'], function () {
    Route::middleware('can:isAdmin')->group(function () {
        Route::get('/admin/placeCreate', 'PlaceController@create')->name('places.create');
        Route::post('/admin/placeStore', 'PlaceController@store')->name('places.store');
        Route::get('/admin/pathCreate', 'PathController@create')->name('paths.create');
        Route::post('/admin/pathStore', 'PathController@store')->name('paths.store');
    });
    Route::middleware('can:isSalesman')->group(function () {
        
    });
    Route::middleware('can:isCustomer')->group(function () {
        
    });
});
