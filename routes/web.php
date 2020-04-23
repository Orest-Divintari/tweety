<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('/tweets', 'TweetController@index')->name('home');
    Route::post('/tweets', 'TweetController@store');
    Route::post('/profiles/{user:username}/follow', 'FollowController@store')->name('follow');
    Route::patch('/profiles/{user:username}', 'ProfileController@update');
    Route::get('/profiles/{user:username}/edit', 'ProfileController@edit')->name('edit-profile');
    Route::get('/explore', 'ExploreController@index');

    Route::post('/tweets/{tweet}/like', 'TweetLikeController@store');
    Route::post('/tweets/{tweet}/dislike', 'TweetLikeController@destroy');
});


Route::get('/profiles/{user:username}', 'ProfileController@show')->name('profile');



// Route::get('/home', 'HomeController@index')->name('home');