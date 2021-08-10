<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', 'App\Http\Controllers\InformationController@index')->name('information.welcome');
Route::get('/create', 'App\Http\Controllers\InformationController@create')->name('information.create');
Route::get('/show/{id}', 'App\Http\Controllers\InformationController@show')->name('information.show');
Route::post('/store', 'App\Http\Controllers\InformationController@store')->name('information.store');
Route::get('/edit/{id}', 'App\Http\Controllers\InformationController@edit')->name('information.edit');
Route::post('/update/{id}', 'App\Http\Controllers\InformationController@update')->name('information.update');
Route::get('/delete/{id}', 'App\Http\Controllers\InformationController@destroy')->name('information.delete');

Route::get('/new/search', 'App\Http\Controllers\InformationController@search')->name('search');
