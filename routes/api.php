<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('/user', 'UserController');
Route::post('/user-register', 'UserController@register');
Route::post('/user-toggle-activate/{id}', 'UserController@toggleActivateUser');
Route::post('/user-login', 'UserController@login');
Route::group(['middleware' => 'auth:api'], function () {
});
Route::resource('/grade', 'GradeController');
Route::resource('/grade-detail', 'GradeDetailController');
Route::resource('/subject', 'SubjectController');
Route::resource('/course', 'CourseController');