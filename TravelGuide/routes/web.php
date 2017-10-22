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
    return view('mywelcome');
});

Route::get('/uaer_home', function () {
    return view('User_home');
});
Route::get('help', function () {
    return view('help');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/help', 'HomeController@help')->name('help');


Route::post('/login/custom' ,[
	'uses'=>'LoginController@login',
	'as'=> 'login.custom'
	]);
Route::group(['middleware'=>'auth'],function(){
	Route::get('/home',function(){
		return view('home');

	})->name('home');

	Route::get('/dashboard',function(){
		return view('dashboard');

	})->name('dashboard');

});
Route::resource('crud', 'CRUDController');



Route::get('/view' , function() {
return view('view');
});
Route::get('/index' , function() {
return view('index');
});

Route::get('search' ,[
	'uses'=>'CRUDController@search',
	'as'=> 'crud.search'
	]);



Route::get('myprofile' ,[
	'uses'=>'UserController@search',
	'as'=> 'myprofile.search'
	]);
Route::get('myprofile' ,[
	'uses'=>'UserController@search',
	'as'=> 'myprofile.search'
	]);

Route::resource('review','ReviewController');
Route::get('reviewSearch' ,[
	'uses'=>'ReviewController@search',
	'as'=> 'review.search'
	]);


Route::get('view' ,[
	'uses'=>'CRUDController@view',
	'as'=> 'view.search'
	]);

Route::get('crud/newReview', function () {
    return view('crud/newReview');
});
Route::Post('updateReview' ,[
	'uses'=>'ReviewController@update',
	'as'=> 'review.update'
	]);
Route::resource('userinfo','UserController');

Route::group(['prefix' =>'api','middleware'=>'api'],function(){
Route::resource('cruds','CRUDController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('send','MailController@send');

