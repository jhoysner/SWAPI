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


Route::get('/', 'PeopleController@index');

Route::post('/', 'PeopleController@index');

Route::get('/{id}' , 'PeopleController@find')->name('find.people');
