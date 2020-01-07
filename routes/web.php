<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

/* --- GET Reqeusts --- */

/* - Redirects - */
Route::get('/home', function(){
    return redirect()->route('index');
});
/* - End redirects - */

Route::get('/', 'HomeController@index')->name('index');

Route::get('/p', 'PostsController@create')->name('posts.create');
Route::get('/p/{id}', 'PostsController@show')->name('posts.view');

Route::get('/profile', 'ProfilesController@index')->name('profile.show')->middleware('auth');
Route::get('/profile/edit', 'ProfilesController@edit')->name('profile.edit')->middleware('auth');
Route::get('/profile/{user}', 'ProfilesController@inspect')->name('profile.view');

/* --- POST requests --- */

Route::post('/p', 'PostsController@store');

Route::post('/profile/edit', 'ProfilesController@modify');



