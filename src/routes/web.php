<?php

Route::group(['namespace' => 'Inspirium\BookManagement\Controllers', 'middleware' => 'web', 'prefix' => 'book'], function() {

    Route::get('/', 'BookController@showBooks');
    Route::get('show/{id}', 'BookController@showBook');

    Route::group(['prefix' => 'author'], function() {
        Route::get('/', 'AuthorController@showAuthors');
        Route::get('show/{id}', 'AuthorController@showAuthor');
    });
});
