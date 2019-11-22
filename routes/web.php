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


use App\Category;
use App\CourseSlug;
use App\Post;
Auth::routes();




Route::get('/', 'Home\HomeController@index')->name('home');
Route::get('/logout', 'Auth\LogoutController@index')->name('mylogout');

//    Route::get('/test', function () {
//        return view('test');
//    });

Route::namespace('Home')->group(function () {
    Route::prefix('blog')->name('blog.')->group(function () {
        Route::get('/', 'BlogController@index')->name('index');
        Route::get('/post/{post}', 'BlogController@show')->name('show');
        Route::get('/category/{category}', 'BlogController@category')->name('category');
    });

    Route::prefix('courses')->name('courses.')->group(function () {
        Route::get('/', 'CourseController@index')->name('index');
        Route::get('/{course_slug}/list', 'CourseController@list')->name('list');
        Route::get('/show/{course_slug}/{lesson}', 'CourseController@lesson')->name('lesson');
    });


    Route::prefix('gateway')->name('gateway.')->group(function () {
        Route::post('/', 'GatewayController@index')->name('index');
        Route::post('/verify', 'GatewayController@verify')->name('verify');
    });

    Route::prefix('clientarea')->name('clientarea.')->middleware('auth')->group(function () {
        Route::get('/', 'HomeController@clientarea')->name('index');
    });


});
