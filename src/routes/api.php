<?php

Route::group(['namespace' => 'Inspirium\BookManagement\Controllers\Api', 'middleware' => 'web', 'prefix' => 'api'], function() {

    Route::group(['prefix' => 'author'], function() {
        Route::get('/{id}', 'AuthorController@getAuthor');
        Route::get('search/{term}', 'AuthorController@search');

    });

});
