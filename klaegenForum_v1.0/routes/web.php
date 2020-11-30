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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','TopicController@index')->name('topics.index');

Route::resource('topics', 'TopicController')->except(['index']); //might come here to remove it as I actually want topics under /topics
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
