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

// Admin routes
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
    Route::get('/', 'DashboardController@index');

    /* Report */
    Route::get('/report', 'ReportController@index')->name('report.index');
    Route::get('/report/create', 'ReportController@create')->name('report.create');
    Route::get('/report/edit/{id}', 'ReportController@edit')->name('report.edit')->where('id', '[0-9]+');
    Route::get('/report/update/{id}', 'ReportController@update')->name('report.update')->where('id', '[0-9]+');
    Route::get('/report/delete/{id}', 'ReportController@destroy')->name('report.delete')->where('id', '[0-9]+');

    Route::post('/report/create', 'ReportController@store');
    Route::post('/report/update/{id}', 'ReportController@update')->where('id', '[0-9]+');

    /* Configuration */
    Route::get('/configuration', 'ConfigurationController@index')->name('configuration.index');

    Route::post('/configuration/destroy', 'ConfigurationController@destroy')->name('configuration.destroy');
    Route::post('/configuration/store', 'ConfigurationController@store')->name('configuration.store');

    /* User Role */
    Route::get('/userrole', 'UserRoleController@index')->name('userrole.index');
    Route::get('/userrole/create', 'UserRoleController@create')->name('userrole.create');
    Route::get('/userrole/ajax/', 'UserRoleController@ajax')->name('userrole.ajax');

    Route::post('/userrole/create', 'UserRoleController@store');
    Route::post('/userrole/ajax/', 'UserRoleController@ajax');
});

// Site routes
Route::group(['namespace' => 'Site'], function() {
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/home', 'HomeController@home')->name('home');
});

Auth::routes();
