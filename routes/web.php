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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\TweetController@index')->name('dashboard');
    Route::post('/tweets', 'App\Http\Controllers\TweetController@store')->name('tweets');
    Route::post('/profiles/{user:username}/follow', 'App\Http\Controllers\FollowsController@store')->name('follow');
    Route::get('/profiles/{user:username}/edit', 'App\Http\Controllers\ProfilesController@edit')->middleware('can:edit,user');
    Route::patch('/profiles/{user:username}', 'App\Http\Controllers\ProfilesController@update')->middleware('can:edit,user');

    Route::post('/tweets/{tweet}/like', 'App\Http\Controllers\TweetLikesController@store');
    Route::delete('/tweets/{tweet}/like', 'App\Http\Controllers\TweetLikesController@destroy');

    Route::get('/explore', 'App\Http\Controllers\ExploreController');
});

Route::get('/profiles/{user:username}', 'App\Http\Controllers\ProfilesController@show')->name('profile');

