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



Auth::routes();

Route::get('/', 'HomeController@index');

// user Routes
Route::get('/users', 'Auth\UserController@index');
Route::get('/users/edit/{user}', 'Auth\UserController@edit');
Route::patch('/users/edit/{user}', 'Auth\UserController@update');
Route::get('/users/delete/{user}', 'Auth\UserController@delete');

Route::get('/profile', 'Auth\UserController@profile');
Route::patch('profile/{user}', 'Auth\UserController@update_profile');

//Client Routes
Route::get('/clients', 'ClientController@index');
Route::get('/clients/show/{client}', 'ClientController@show');

Route::get('/clients/new', 'ClientController@create');
Route::post('/clients', 'ClientController@store');

Route::get('/clients/edit/{client}','ClientController@edit');
Route::patch('/clients/edit/{client}', 'ClientController@update');

Route::get('/clients/delete/{client}','ClientController@delete');

// Client Logbook

//Client Contacts

//Client Calendar

//Client HandlePlan

//Client Pædagogisk HandlePlan

// Client Mål

// Client Delmål

