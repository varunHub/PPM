<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/
//test from VAU

App::before(function($request)
{
	View::share('app_url', 			Config::get('app.app_url') );
	View::share('app_url_cdn', 		Config::get('app.app_url_cdn') );
	View::share('app_url_api', 		Config::get('app.app_url_api') );
	View::share('app_url_user', 	Config::get('app.app_url_user') );
	View::share('app_url_admin', 	Config::get('app.app_url_admin') );
	View::share('app_title', 		Config::get('app.app_title') );
	View::share('app_title_user', 	Config::get('app.app_title_user') );		
	View::share('app_title_admin', 	Config::get('app.app_title_admin') );
	View::share('app_upload_put',	Config::get('app.app_upload_put') );
	View::share('app_upload_get',	Config::get('app.app_upload_get') );
});

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::guest('login');
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});







Event::listen("illuminate.query", function($query, $bindings, $time, $name)
{
	Log::info($query . " >> " . implode("|", $bindings) );
});
