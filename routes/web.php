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

Auth::routes(['verify' => true]);

Route::get('/', 'TopicsController@index')->name('root')->middleware('verified');

Route::resource('users','UsersController');
Route::resource('topics', 'TopicsController', ['only' => ['index', 'create', 'store', 'update', 'edit', 'destroy']]);

Route::post('upload_image', 'TopicsController@uploadImage')->name('topics.upload_image');
Route::resource('categories', 'CategoriesController', ['only' => ['show']]);

Route::resource('replies', 'RepliesController', ['only' => ['store', 'destroy']]);

Route::get('topics/{topic}/{slug?}', 'TopicsController@show')->name('topics.show');
Route::get('test','TestController@getPublicKey');


Route::resource('notifications', 'NotificationsController', ['only' => ['index']]);


Route::get('permission-denied', 'PagesController@permissionDenied')->name('permission-denied');