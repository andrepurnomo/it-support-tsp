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
Route::get('/home/wait', 'HomeController@wait')->name('wait');
Route::get('/home/process', 'HomeController@process')->name('process');
Route::get('/home/done', 'HomeController@done')->name('done');
Route::post('/home/search', 'HomeController@search')->name('home.search');
Route::get('/home/to_done/{id}', 'HomeController@to_done')->name('to_done');
Route::redirect('/', '/home', 301);
Route::resource('/home', 'HomeController');

Route::middleware(['auth'])->group(function() {
    Route::get('/server', 'DashboardController@server')->name('server');
    Route::get('/task', 'DashboardController@task')->name('task');
    Route::middleware(['notStaff'])->group(function() {
        Route::get('/report', 'DashboardController@report')->name('report.index');
        Route::get('/report/result', 'DashboardController@report_result')->name('report.result');
        Route::get('/users/search', 'UserController@search')->name('user.search');
        Route::resource('/users', 'UserController');
    });
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
