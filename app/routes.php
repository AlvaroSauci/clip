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

// Login-----------------------------------------------------------------------

Route::get('/', array( 'as' => 'login', function()
{
	return View::make('login');
}));

Route::post('login/check', array( 'as' => 'loginCheck', 'uses' => 'LoginController@check'));

Route::get('login', array( 'as' => 'login', function()
{
	return View::make('login');
}));

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

// Dashboard--------------------------------------------------------------------

Route::get('dashboard', array( 'as' => 'dashboard', 'before' => 'auth', function()
{

	$comments 		= Comment::where('id_padre', '==', 0)->orderBy( 'created_at', 'DESC' )->paginate(10);
	$commentsHijos 	= Comment::where('id_padre', '!=', 0)->orderBy('created_at', 'ASC')->get();

	return View::make('dashboard')->with('comments', $comments)->with('commentsHijos', $commentsHijos);
}));

Route::post('dashboard/check', array( 'as' => 'dashboardCheck', 'uses' => 'DashboardController@check'));

Route::get('dashboard/reclippeaComment/{id}', array('as'=>'reclippea', 'uses'=>'DashboardController@reclippeaComment'));

Route::post('dashboard/answerComment/{id}', array('as'=>'answer', 'uses'=>'DashboardController@answerComment'));

Route::get('/logout', array('as' => 'logout', 'before' => 'auth', 'uses' => 'LoginController@Logout'));

// Contact-----------------------------------------------------------------------

Route::get('contact', array( 'as' => 'contact', 'before' => 'auth', function()
{
	return View::make('contact');
}));

Route::post('contact/check', array( 'as' => 'contactCheck', 'uses' => 'ContactController@check'));
