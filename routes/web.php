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
    return redirect()->route('login.index');
});
Route::get('/login', 'LoginController@index')->name('login.index');
Route::get('/moderator', 'moderatorController@index')->name('moderator.index');
Route::get('/moderator/reportedpost', 'moderatorController@reported_post')->name('moderator.reported_post');
Route::post('/moderator/reportedpost', 'moderatorController@status_update_reported_post');
Route::get('/moderator/unverifiedpost', 'moderatorController@unverified_post')->name('moderator.unverified_post');
Route::post('/moderator/unverifiedpost', 'moderatorController@verification_update_articles');
Route::get('/moderator/delete_post', 'moderatorController@delete_post')->name('moderator.delete_post');
Route::post('/moderator/delete_post', 'moderatorController@delete_articles');
Route::get('/moderator/notice', 'moderatorController@notice_index')->name('moderator.notice');
Route::get('/moderator/notice/create', 'moderatorController@create_notice_render')->name('moderator.notice.create');
Route::post('/moderator/notice/create', 'moderatorController@create_notice_store');





