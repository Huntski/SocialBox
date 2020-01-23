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

    // Profile
    Route::get('/profile', 'ProfilesController@index')->name('profile.show');
    Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.inspect');

    // Posts
    Route::get('/post/delete/{id}', 'PostsController@delete')->name('posts.delete');

    // Settings
    Route::get('/settings', 'SettingsController@index')->name('settings.show');

    /* --- POST requests --- */

    // Posts
    Route::post('/post/store', 'PostsController@store')->name('posts.store');

    // Settings
    Route::post('/settings', 'SettingsController@store')->name('settings.store');

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




