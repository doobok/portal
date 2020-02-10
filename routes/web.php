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

Auth::routes(['verify' => true]);

// Vue routes
Route::group(['prefix' => 'serv-data'], function () {
  Route::get('menu', 'Vue\MainDataController@menu');
  Route::get('tags', 'Vue\MainDataController@tags');
  Route::get('news', 'Vue\MainDataController@news');
  Route::get('now-time', 'Vue\MainDataController@now');
  Route::get('initiatives', 'Vue\MainDataController@initiatives');
  Route::post('initiative-add', 'InitiativesController@addForm');
  Route::post('initiative-status', 'InitiativesController@status');
  Route::post('initiative-subscribe', 'InitiativesController@subscribe');
  Route::post('initiative-unsubscribe', 'InitiativesController@unsubscribe');
  Route::post('initiative-upd/{id}', 'InitiativesController@update');
  Route::post('msg-send', 'Vue\MessageController@sendMsg');
  Route::get('msg-check', 'Vue\MessageController@check');
  Route::get('messages', 'Vue\MessageController@messages');

});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/messages', 'HomeController@messages')->name('messages');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// Main routes
Route::get('/news', 'NewsController@index')->name('news');
Route::get('/news/{slug}', 'NewsController@article')->name('article');
Route::get('/initiatives', 'InitiativesController@index')->name('initiatives');
Route::get('/initiatives/add', 'InitiativesController@add')->name('initiative-add');
Route::get('/initiatives/{id}', 'InitiativesController@article')->name('initiative');
Route::get('/events', 'EventsController@index')->name('events');
Route::get('/events/{id}', 'EventsController@article')->name('event');
Route::get('/contacts', 'PagesController@contacts')->name('contacts');
Route::get('/{slug}', 'PagesController@index')->name('page');
