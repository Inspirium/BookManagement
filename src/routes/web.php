<?php

Route::group(['namespace' => 'Inspirium\BookManagement\Controllers', 'middleware' => 'web', 'prefix' => 'books'], function() {

    Route::get('/', 'BookController@showBooks');
    Route::group(['prefix' => 'book'], function() {
	    Route::get('show/{id}', 'BookController@showBook');
	    Route::get('edit/{id?}', 'BookController@editBook');
    });

	Route::get('authors', 'AuthorController@showAuthors');
    Route::group(['prefix' => 'author'], function() {
        Route::get('show/{id}', 'AuthorController@showAuthor');
        Route::get('edit/{id?}', 'AuthorController@editAuthor');
    });

	Route::get('categories', 'CategoryController@showCategories');
    Route::group(['prefix' => 'category'], function() {
        Route::get('show/{id}', 'CategoryController@showCategory');
        Route::get('edit/{id?}', 'CategoryController@editCategory');
    });
});
