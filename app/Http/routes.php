<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('news/{a}', function ($a) {
//    return 'News: '.$a;
//})->where('a','[0-9]+');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::pattern('id', '[0-9]+');


	Route::get('/', ['as' => 'home',  'uses' => 'HomeController@index']);
	Route::get('about', ['as' => 'about',  'uses' => 'HomeController@about']);
	Route::get('services', ['as' => 'services',  'uses' => 'HomeController@services']);
	Route::get('portfolio', ['as' => 'portfolio',  'uses' => 'HomeController@portfolio']);
	Route::get('contact', ['as' => 'contact',  'uses' => 'HomeController@contact']);

	Route::get('hacking', ['uses' => 'HomeController@hacking']);
	
	Route::get('hi', ['as' => 'hi', function () {
	    return view('hello');
	}]);
	Route::get('hello/{name?}', function ($name = 'it me') {
	    return 'Hello, '.ucfirst($name);
	});

	#post CRUD
	Route::group(['prefix' => 'posts'], function(){
		Route::get('{id}'  , ['as'=>'posts.show', 'uses' => 'PostsController@show']);
		Route::get('create', ['as'=>'posts.create', 'uses' => 'PostsController@create']);
	});

	Route::group(['prefix' => 'admin'], function(){
		Route::get('hi', ['as' => 'hi', function () {
		    return 'hello, world!';
		}]);
		Route::get('hacking', function () {
	    return view('welcome');
		});
	});

});
