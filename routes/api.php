<?php

use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    Route::get('/authors', 'App\Http\Controllers\AuthorController@index')->name('authors.index');
    Route::post('/authors', 'App\Http\Controllers\AuthorController@store')->name('authors.store');
    Route::get('/authors/{author}', 'App\Http\Controllers\AuthorController@show')->name('authors.show');
    Route::delete('/authors/{author}', 'App\Http\Controllers\AuthorController@destroy')->name('authors.destroy');

    Route::get('/books', 'App\Http\Controllers\BookController@index')->name('books.index');
    Route::post('/books/search', 'App\Http\Controllers\BookController@search')->name('books.search');
    Route::post('/books', 'App\Http\Controllers\BookController@store')->name('books.store');
    Route::get('/books/{book}', 'App\Http\Controllers\BookController@show')->name('books.show');
    Route::delete('/books/{book}', 'App\Http\Controllers\BookController@destroy')->name('books.destroy');

    Route::post('/comments', 'App\Http\Controllers\CommentController@store')->name('comments.store');
});

