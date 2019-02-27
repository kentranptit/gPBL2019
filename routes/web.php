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
})->name('welcome');

//Route::get('/employees', 'EmployeeController@index');
// Route::get('/leaves', 'JoinController@index');
Route::get('/visualize', 'VisualizationController@index')->name('visualize');
Route::get('/search', 'SearchController@index')->name('search');
Route::get('/user');
