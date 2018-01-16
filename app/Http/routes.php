<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('test', function () {
    return view('test');
});
Route::get('query', function () {
    return view('query');
});
Route::any('queryResult', 'RecruitController@queryResult');

Route::group(['middleware' => 'auth'], function () {
    Route::any('input', 'RecruitController@add');
    Route::any('lists', 'RecruitController@allStudents');
    Route::any('update/{id}', 'RecruitController@update');
    Route::any('delete/{id}', 'RecruitController@delete');

});


// 认证路由...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
// 注册路由...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');



