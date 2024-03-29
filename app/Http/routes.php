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


        Route::get('/logout', ['as' => 'logout', function () {
            Auth::logout();
            return Redirect::route('login.create');
        }]);

        Route::get('/', ['as' => 'index', 'uses' => 'DashboardController@index']);


    });

    Route::group(['middleware' => ['auth', 'teacher']], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'DashboardController@index']);

        Route::get('/list_assignments', ['as' => 'list_assignments', 'uses' => 'DashboardController@listAssignments']);
        Route::get('/list_teachers', ['as' => 'list_teachers', 'uses' => 'DashboardController@listTeachers']);

        Route::get('/step_1', ['as' => 'create_step_1', 'uses' => 'DashboardController@createStep1']);
        Route::post('/step_1', ['as' => 'save_step_1', 'uses' => 'DashboardController@saveStep1']);
        Route::get('/step_2', ['as' => 'create_step_2', 'uses' => 'DashboardController@createStep2']);
        Route::post('/step_2', ['as' => 'save_step_2', 'uses' => 'DashboardController@saveStep2']);
        Route::get('/step_3/{id}', ['as' => 'create_step_3', 'uses' => 'DashboardController@createStep3']);

        Route::post('/delete_assignment', ['as' => 'delete_assignment', 'uses' => 'DashboardController@deleteAssignment']);

    });

    Route::group(['middleware' => ['auth', 'student']], function () {
        Route::get('/student', ['as' => 'index_student', 'uses' => 'StudentController@index']);
        Route::post('/get_user_groups', ['as' => 'get_user_groups', 'uses' => 'StudentController@getUserGroups']);
        Route::post('/change_group', ['as' => 'change_group', 'uses' => 'StudentController@changeGroup']);
        Route::post('/execute_group', ['as' => 'execute_group', 'uses' => 'StudentController@executeChange']);

    });

    Route::get('/login', ['as' => 'login.create', 'uses' => 'LoginController@createLogin']);
    Route::post('/login', ['as' => 'login.save', 'uses' => 'LoginController@saveLogin']);
    Route::get('/register', ['as' => 'register.create', 'uses' => 'LoginController@createRegister']);
    Route::post('/register', ['as' => 'register.save', 'uses' => 'LoginController@saveRegister']);
});
