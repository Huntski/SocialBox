<?php

Auth::routes();

Route::group(['middleware' => ['web', 'auth']], function() {
    /* - Redirects - */
    Route::get('/home', function(){
        return redirect()->route('home');
    });

    /* --- GET Reqeusts --- */

    // Home
    Route::get('/home', 'HomeController@show')->name('home');

    // Posts
    Route::get('/post/{id}', 'PostsController@show')->name('posts.view');

    // Profile
    Route::get('/profile', 'ProfilesController@index')->name('profile.user');
    Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.inspect');

    /* --- POST requests --- */

    // Posts
    Route::post('/post', 'PostsController@store')->name('posts.store');

    // Profile
    Route::post('/profile/edit', 'ProfilesController@modify')->name('profile.edit');

    // Comments
    Route::post('/comment', 'CommentsController@store')->name('comment.store');
    Route::post('/comment/delete', 'CommentsController@delete')->name('comment.delete');
});

Route::group(['middleware' => 'guest'], function() {

    Route::get('/', function(){
        return redirect()->route('welcome');
    });

    Route::get('/welcome', function(){
        return view('welcome');
    })->name('welcome');
});




