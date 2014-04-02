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

$module = "../module";

Route::get('/test', function()
{
	return View::make('hello');
});


include "$module/SysSetting/routes.php"; //Setting Module  	[Admin/setting/....]
include "$module/Message/routes.php"; //Message Module 		[Message/....]
