<?php

Route::group(['middleware' => ['web', 'auth']], function() {
    /* - Redirects - */
    Route::get('/home', function(){
        return redirect()->route('index');
    });

    /* --- GET Reqeusts --- */

    Route::get('/', 'HomeController@index')->name('index');

    Route::get('/p', 'PostsController@create')->name('posts.create');
    Route::get('/p/{id}', 'PostsController@show')->name('posts.view');

    Route::get('/profile', 'ProfilesController@index')->name('profile.index');
    Route::get('/profile/{user}', 'ProfilesController@inspect')->name('profile.index');

    /* --- POST requests --- */

    Route::post('/post', 'PostsController@store');
    Route::post('/profile/edit', 'ProfilesController@modify');
});

Auth::routes();



