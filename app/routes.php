<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array( 'as' => 'login', function()
{
	return View::make('login');
}));

Route::post('login/check', array( 'as' => 'loginCheck', 'uses' => 'LoginController@check'));

// Lang------------------------------------------------------------------------

Route::get('lang/{lang}', array('as' => 'lang', function($lang)
{
	Session::put('localeLang', $lang);
	return Redirect::to( URL::previous() );
}));

// Register--------------------------------------------------------------------

Route::get('register',  array( 'as' => 'register', function()
{
	return View::make('register');
}));

Route::post('register/check', array('as'=>'registerCheck', 'uses'=> 'RegisterController@check'));

// Index------------------------------------------------------------------------

Route::get('dashboard', ['before' => 'auth', function()
{

	$comments 	= Comment::orderBy('created_at', 'DESC')->paginate(10);

	return View::make('dashboard')->with('comments', $comments);
}]);

Route::post('dashboard/check', ['uses' => 'DashboardController@check']);

Route::get('/logout', array('as' => 'logout', 'before' => 'auth', 'uses' => 'LoginController@Logout'));

