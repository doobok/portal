<?php

use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('desktop/index');
})->name('mainpage');

Auth::routes(['verify' => true]);

// Vue routes
Route::group(['prefix' => 'serv-data'], function () {
  Route::get('menu', 'Vue\MainDataController@menu');
  Route::get('tags', 'Vue\MainDataController@tags');
  Route::get('courses', 'Vue\MainDataController@courses');
  Route::get('now-time', 'Vue\MainDataController@now');
  // news
  Route::get('news', 'Vue\MainDataController@news');
  Route::post('news-add', 'NewsController@addForm');
  // initiatives
  Route::get('initiatives', 'Vue\MainDataController@initiatives');
  Route::post('initiative-add', 'InitiativesController@addForm');
  Route::post('initiative-status', 'InitiativesController@status');
  Route::post('initiative-subscribe', 'InitiativesController@subscribe');
  Route::post('initiative-unsubscribe', 'InitiativesController@unsubscribe');
  Route::post('initiative-upd/{id}', 'InitiativesController@update');
  // massages
  Route::post('msg-send', 'Vue\MessageController@sendMsg');
  Route::get('msg-check', 'Vue\MessageController@check');
  Route::get('messages', 'Vue\MessageController@messages');
  // backet
  Route::post('backet-add', 'Vue\BacketController@addItem');
  Route::get('backet-get', 'Vue\BacketController@getItems');
  Route::post('backet-book', 'Vue\BacketController@bookItems');
  Route::patch('backet-remove/{id}', 'Vue\BacketController@remove');
  // user
  Route::post('user-update/{id}', 'UsersController@userUpdate');
  // experts
  Route::get('experts', 'ExpertsController@experts');
  Route::post('expert-add', 'ExpertsController@addForm');
  // search
  Route::get('search', function (Request $request) {
    return App\Search::search($request->keywords)->get();
});

});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/messages', 'HomeController@messages')->name('messages');
Route::get('/user/messages/{id}', 'HomeController@messageChat')->name('chat');
Route::get('/user/backet', 'HomeController@backet')->name('backet');
Route::get('/user/edit', 'HomeController@editProfile')->name('useredit');
Route::get('/user/{id}', 'PagesController@publicUsProfile')->name('user');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// Main routes
Route::get('/news', 'NewsController@index')->name('news');
Route::get('/news/add', 'NewsController@add')->middleware('auth')->name('news-add');
Route::get('/news/{slug}', 'NewsController@article')->name('article');
Route::get('/initiatives', 'InitiativesController@index')->name('initiatives');
Route::get('/initiatives/add', 'InitiativesController@add')->name('initiative-add');
Route::get('/initiatives/{id}', 'InitiativesController@article')->name('initiative');
Route::get('/events', 'EventsController@index')->name('events');
Route::get('/events/{id}', 'EventsController@article')->name('event');
Route::get('/courses', 'CoursesController@index')->name('courses');
Route::get('/courses/{id}', 'CoursesController@article')->name('course');
Route::get('/experts', 'ExpertsController@index')->name('experts');
Route::get('/experts/add', 'ExpertsController@add')->name('expert-add');
Route::get('/contacts', 'PagesController@contacts')->name('contacts');
Route::get('/{slug}', 'PagesController@index')->name('page');
