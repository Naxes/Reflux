<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/* Auth */
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

/* Users */
Route::get('/{user}', 'UsersController@show');
Route::get('/edit/{user}', 'UsersController@edit');
Route::patch('/edit/{user}', 'UsersController@update');

/* Posts */
Route::get('/', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create');
Route::get('/posts/{post}', 'PostsController@show');
Route::get('/posts/edit/{post}', 'PostsController@edit');
Route::post('/posts', 'PostsController@store');
Route::patch('/posts/{post}', 'PostsController@update');
Route::delete('/posts/{post}', 'PostsController@destroy');

/* Votes */
Route::post('/vote/{post}', 'VotesController@like');

/* Comments */
Route::post('/posts/{post}/comments', 'CommentsController@store');


