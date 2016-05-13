<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 2/05/16
 * Time: 16:21
 */

Route::group(['middleware' => ['auth']], function () {
    Route::get('task/{id}/tag', 'TagController@index');
    Route::resource('task', 'TaskController');
    Route::resource('tag', 'TagController');
});