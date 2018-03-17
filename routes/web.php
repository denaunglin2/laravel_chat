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


Route::group(['middleware'=>'auth'], function (){

    Route::get('/',[
        'uses'=>'HomeController@getWelcome',
        'as'=>'/'
    ]);
    Route::get('/logout',[
        'uses'=>'AuthController@logout',
        'as'=>'logout'
    ]);
});


Route::get('/login',[
    'uses'=>'AuthController@getLogin',
    'as'=>'login'
]);

Route::get('/register',[
    'uses'=>'AuthController@getRegister',
    'as'=>'register'
]);

Route::post('/register',[
    'uses'=>'AuthController@postRegister',
    'as'=>'register'
]);

Route::post('/login',[
    'uses'=>'AuthController@postLogin',
    'as'=>'login'
]);

Route::group(['prefix'=>'activate'], function (){
    Route::get('/email',[
        'uses'=>'ActivateController@getEmail',
        'as'=>'activate.email'
    ]);
    Route::post('/check-email',[
        'uses'=>'ActivateController@checkEmail'

    ]);
    Route::get('/code',[
        'uses'=>'ActivateController@getCode',
        'as'=>'activate.code'
    ]);
    Route::post('/check-code',[
        'uses'=>'ActivateController@checkCode',
    ]);
});