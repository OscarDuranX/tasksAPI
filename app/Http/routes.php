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

use Faker\Provider\es_ES\Person;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/auth/login', function () {
    return 'No tens acces a la API';
});



//Route::group(['prefix' => 'api/v1', 'middleware' => 'auth:api'], function () {
//    Route::post('/short', 'UrlMapperController@store');
//});