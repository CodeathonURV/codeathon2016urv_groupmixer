<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
        Route::post('/step_1', ['as' => 'save_step_1','uses'=>'DashboardController@saveStep1']);

        Route::get('/step_2', ['as' => 'create_step_2','uses'=>'DashboardController@createStep2']);
        Route::post('/', ['as' => 'file_upload', 'uses' => 'DashboardController@upload']);
    });

    Route::get('/login', ['as' => 'login.create', 'uses' => 'LoginController@createLogin']);
    Route::post('/login', ['as' => 'login.save', 'uses' => 'LoginController@saveLogin']);
    Route::get('/register', ['as' => 'register.create', 'uses' => 'LoginController@createRegister']);
    Route::post('/register', ['as' => 'register.save', 'uses' => 'LoginController@saveRegister']);
});
