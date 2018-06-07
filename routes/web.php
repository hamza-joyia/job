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

Route::get('register','UserController@register')->name('register');
Route::get('crud','UserController@display')->name('crud');
Route::get('edit/{id}','UserController@edit');

Route::post('Login','UserController@signIn')->name('login');
Route::post('Signup','UserController@signUp')->name('signup');
Route::post('create','UserController@create')->name('create');


Route::get('hello','UserController@index');

Route::get('excel','ExportController@index');