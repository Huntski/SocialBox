<?php

Route::group(['middleware' => ['web', 'auth']], function() {
    /* - Redirects - */
    Route::get('/home', function(){
        return redirect()->route('index');
    });

    /* --- GET Reqeusts --- */

    // Home
    Route::get('/', 'HomeController@index')->name('index');

    // Posts
    Route::get('/post/{id}', 'PostsController@show')->name('posts.view');

    // Profile
    Route::get('/profile', 'ProfilesController@index')->name('profile.index');
    Route::get('/profile/{user}', 'ProfilesController@inspect')->name('profile.inspect');

    /* --- POST requests --- */

    // Posts
    Route::post('/post', 'PostsController@store')->name('posts.store');

    // Profile
    Route::post('/profile/edit', 'ProfilesController@modify')->name('profile.edit');

    // Comments
    Route::post('/comment', 'CommentsController@store')->name('comment.store');
    Route::post('/comment/delete', 'CommentsController@delete')->name('comment.delete');
});

Auth::routes();



