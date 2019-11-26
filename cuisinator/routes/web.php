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

use App\Http\Controllers\AlimentsController;

Route::get('/', 'HomeController@index');

Auth::routes(['register' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('aliments', 'AlimentsController');
Route::get('alimentsJSON','AlimentsController@alimentsJSON')->name('alimentsJSON');
Route::resource('recettes', 'RecettesController');
Route::get('recettes/find/{query}', 'RecettesController@getRecetteFromAliments')->where('query','.+');

Route::get('/administration', 'AdministrationController@index')->name('Administration');

Route::get('profile', function () {
    // Only authenticated users may enter...
})->middleware('auth');
