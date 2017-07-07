<?php

Route::group(['namespace' => 'Inspirium\BookManagement\Controllers\Api', 'middleware' => 'web', 'prefix' => 'api'], function() {

    Route::group(['prefix' => 'author'], function() {
        Route::get('/{id}', 'AuthorController@getAuthor');
        Route::get('search/{term}', 'AuthorController@search');
        Route::post('/', 'AuthorController@postAuthor');

    });

    Route::group(['prefix' => 'book'], function() {
        Route::group(['prefix' => 'category'], function() {
            Route::get('/', 'CategoryController@getCategories');
        });

        Route::get('types', 'CategoryController@getTypes');
        Route::get('schools', 'CategoryController@getSchools');
        Route::get('subjects', 'CategoryController@getSchoolSubjects');
        Route::get('bibliotecas', 'CategoryController@getBibliotecas');

        Route::get('categorization', 'CategoryController@getAll');
    });

});
