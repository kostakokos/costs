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

Route::get('/', 'CostsController@index');
Route::get('/list', 'CostsController@ajax');
Route::get('/del', 'CostsController@delite');

Route::any('/create', 'CostsController@create')->name('create');
Route::any('/create-type', 'CostsController@createType')->name('create-type');
