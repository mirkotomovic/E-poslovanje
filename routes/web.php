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
Route::get('/admin/placeCreate', 'PlaceController@create')->name('places');
Route::post('/admin/placeStore', 'PlaceController@store')->name('places');
Route::get('/admin/pathCreate', 'PathController@create')->name('paths');
Route::post('/admin/pathStore', 'PathController@store')->name('paths');
Route::get('/admin/companyCreate', 'CompanyController@create')->name('companies');
Route::post('/admin/companyStore', 'CompanyController@store')->name('companies');

Auth::routes();

Route::resource('users', 'UserController');