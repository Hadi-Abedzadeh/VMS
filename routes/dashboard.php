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
Route::prefix('dashboard')->group(function() {
    Route::get('login', 'Auth\AdminLoginController@showLoginForm');
    Route::post('login', 'Auth\AdminLoginController@login')->name('admin-login');
});

Route::prefix('/dashboard')->name('dashboard.')->namespace('Dashboard')->middleware('auth:admin')->group(function () {

        Route::get('/', 'DashboardController@index')->name('index');
        Route::resource('blog', 'blogController');
        Route::resource('courses', 'CourseController');
        Route::resource('term', 'TermController');
        Route::get('course/{id}', 'CourseController@detail')->name('courses.detail');
        Route::post('course/{id}', 'CourseController@courseLesson')->name('courses.course-lesson');
        Route::get('course-upload', 'CourseController@upload')->name('courses.upload');
        Route::post('course-upload', 'CourseController@upload_store')->name('courses.upload_store');

        Route::resource('users', 'UserController');
});
