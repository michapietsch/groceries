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
});

Route::get('/groceries', 'GroceryController@index');
Route::get('/groceries/create', 'GroceryController@create');
Route::post('/groceries', 'GroceryController@store');

Route::get('/storages', 'StorageController@index');
Route::get('/storages/{storage}', 'StorageController@show')->name('storage.show');
Route::patch('/storages/{storage}/groceries/{grocery}', 'StorageGroceriesController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
