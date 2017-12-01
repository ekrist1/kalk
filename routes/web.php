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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::view('/calc/bmi', 'layouts/calc/bmi/show');
Route::view('/calc/paint', 'layouts/calc/paint/show');
Route::get('/calc/power', 'PowerController@index');
Route::get('/admin/power', 'PowerController@create');
Route::patch('/admin/power', 'PowerController@store');