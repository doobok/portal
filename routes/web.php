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
    return view('desktop/index');
});

Auth::routes();

Route::get('/news', 'NewsController@index')->name('news');
Route::get('/news/{slug}', 'NewsController@article')->name('article');

// Vue routes
Route::group(['prefix' => 'serv-data'], function () {
  Route::get('menu', 'Vue\MainDataController@menu');
  Route::get('news', 'Vue\MainDataController@news');

});


Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
