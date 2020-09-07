<?php

use App\Http\Routes\Web;

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

Route::get('/home', 'HomeController@index')->name('home');

Web::routes('threads', [
    'routes' => [
        'show' => 'threads/{channel}/{thread}'
    ]
]);

Route::get('threads/{channel}', 'ThreadsController@index');
Route::post('threads/{channel}/{thread}/replies',    'RepliesController@store')->name('replies.store');
