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



Auth::routes(['verify'=>true]);

Route::get('/', 'TopicsController@index')->name('root');

Route::resource('users','UsersController');

Route::resource('topics', 'TopicsController');

Route::post('topics/upload_image', 'TopicsController@uploadImage')->name('topics.upload_image');
Route::get('topics/{topic}/{slug?}', 'TopicsController@show')->name('topics.show');

Route::resource('categories', 'CategoriesController');
Route::resource('replies', 'RepliesController', ['only' => ['store','destroy']]);

Route::resource('notifications', 'NotificationsController', ['only' => ['index']]);