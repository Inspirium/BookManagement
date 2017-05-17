<?php

Route::group(['namespace' => 'Inspirium\BookManagement\Controllers', 'middleware' => 'web', 'prefix' => 'book'], function() {

    Route::get('/', 'BookController@showBooks');
    Route::get('show/{id}', 'BookController@showBook');
    Route::get('edit/{id?}', 'BookController@editBook');

    Route::group(['prefix' => 'author'], function() {
        Route::get('/', 'AuthorController@showAuthors');
        Route::get('show/{id}', 'AuthorController@showAuthor');
        Route::get('edit/{id?}', 'AuthorController@editAuthor');
    });

    Route::group(['prefix' => 'category'], function() {
        Route::get('/', 'CategoryController@showCategories');
        Route::get('show/{id}', 'CategoryController@showCategory');
        Route::get('edit/{id?}', 'CategoryController@editCategory');
    });
});
