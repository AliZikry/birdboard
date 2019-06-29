<?php

use App\Project;

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

Route::group(['middleware' => ['auth']], function () {

    Route::get('/projects' , 'ProjectsController@index')->name('index');
    Route::get('/projects/create' , 'ProjectsController@create')->name('create');
    Route::get('/projects/{project}' , 'ProjectsController@show')->name('show');
    Route::get('/projects/{project}/edit', 'ProjectsController@edit')->name('edit');
    Route::post( '/projects/{project}/update' , 'ProjectsController@update')->name('update');
    Route::post('/projects' , 'ProjectsController@store')->name('store');
    Route::post('/projects/{project}' , 'ProjectsController@destroy')->name('delete');

    Route::post('/projects/{project}/tasks', 'ProjectTasksController@store')->name('storeTasks');
    Route::post('/projects/{project}/tasks/{task}', 'ProjectTasksController@update')->name('updateTasks');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
