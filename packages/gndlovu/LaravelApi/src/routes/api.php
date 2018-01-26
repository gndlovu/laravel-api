<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => '\gndlovu\LaravelApi\Http\Controllers', 'middleware' => 'api'], function () {
    Route::prefix('api/v1/')->group(function () {
        Route::post('/task', 'TaskController@postTask');
        Route::get('/tasks/{status?}', 'TaskController@getTasks');
        Route::put('/task/{id}', 'TaskController@putTask');
        Route::delete('/task/{id}', 'TaskController@deleteTask');
    });
});
