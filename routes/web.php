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
Route::get('/searchValue','moderatorController@search');
Route::post('/moderator/reportedpost', 'moderatorController@status_update_reported_post');
Route::get('/moderator/unverifiedpost', 'moderatorController@unverified_post')->name('moderator.unverified_post');
Route::post('/moderator/unverifiedpost', 'moderatorController@verification_update_articles');
Route::get('/moderator/delete_post', 'moderatorController@delete_post')->name('moderator.delete_post');
Route::post('/moderator/delete_post', 'moderatorController@delete_articles');
Route::get('/moderator/notice', 'moderatorController@notice_index')->name('moderator.notice');
Route::get('/moderator/notice/create', 'moderatorController@create_notice_render')->name('moderator.notice.create');
Route::post('/moderator/notice/create', 'moderatorController@create_notice_store');
Route::get('/moderator/low_accuracy', 'moderatorController@low_acccuracy_post_render')->name('moderator.low_accuracy');
Route::get('/super_user', 'super_userController@index')->name('super_user.index');
Route::get('/super_user/reportedpost', 'super_userController@reported_post')->name('super_user.reported_post');
Route::post('/super_user/reportedpost', 'super_userController@status_update_reported_post');
Route::get('/super_user/unverifiedpost', 'super_userController@unverified_post')->name('super_user.unverified_post');
Route::post('/super_user/unverifiedpost', 'super_userController@verification_update_articles');
Route::get('/super_user/notice', 'super_userController@notice_index')->name('super_user.notice');
Route::get('/super_user/notice/create', 'super_userController@create_notice_render')->name('super_user.notice.create');
Route::post('/super_user/notice/create', 'super_userController@create_notice_store');
Route::get('/super_user/low_accuracy', 'super_userController@low_acccuracy_post_render')->name('super_user.low_accuracy');
Route::get('/super_user/user_list', 'super_userController@user_list')->name('super_user.user_list');
Route::get('/super_user/comment_reports', 'super_userController@comment_reports')->name('super_user.comment_report');
Route::post('/super_user/comment_reports', 'super_userController@comment_reports_do');
Route::get('/super_user/user_list_updated', 'super_userController@increase_level')->name('super_user.increase_limit');








