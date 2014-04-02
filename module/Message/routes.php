<?php

/*
|--------------------------------------------------------------------------
| System Message Module Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for this module.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

$dir = "module\Message\Controller";

Route::get("Message/list/{id}", 	array("uses" => "$dir\messageCont@get_viewall"));