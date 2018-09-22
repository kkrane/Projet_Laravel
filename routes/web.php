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

Route::get('/', function () {
    return view('welcome');
});

Route::get('posts', function (){
	return App\Post::all();
});

Route::get('posts/{id}', function($id){
	return App\Post::find($id);
});

Route::get('/', 'FrontController@index');

Route::get('post/{id}', 'FrontController@show')->where(['id' => '[0-9]+']);

Route::get('formation', 'FrontController@showPostByFormation')->where(['id' => '[0-9]+']);

Route::get('contact', 'FrontController@contact');

Route::post('contact', 'FrontController@maildev')->name('maildev');

Route::get('stage', 'FrontController@showPostByStage')->where(['id' => '[0-9]+']);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin/post', 'PostController')->middleware('auth');


