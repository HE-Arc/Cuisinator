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

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/aliments', 'AlimentsController');
Route::resource('/recettes', 'RecetteController');

Route::get('/administration', 'AdministrationController@index')->name('Administration');

Route::get('profile', function () {
    // Only authenticated users may enter...
})->middleware('auth');
