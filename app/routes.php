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

Route::get('/test', function()
{
	return View::make('hello');
});

$dir = "module\SysSetting\Controller";
//Setting Table
Route::get("Admin/setting/search", 	array("uses" => "$dir\sysSettingCont@pst_search"));
Route::get("Admin/setting/create", 	array("uses" => "$dir\sysSettingCont@get_create"));
Route::resource("Admin/setting", "$dir\sysSettingCont");
Route::post("Admin/setting/{id}", 	array("uses" => "$dir\sysSettingCont@pst_save"));
Route::post("Admin/setting/{id}/edit", 	array("uses" => "$dir\sysSettingCont@get_edit"));
Route::post("Admin/setting/{id}/chgLock", 	array("uses" => "$dir\sysSettingCont@pst_lock"));
Route::post("Admin/setting/{id}/remove", 	array("uses" => "$dir\sysSettingCont@pst_remove"));
Route::post("Admin/setting/{id}/Editdata", 	array("uses" => "$dir\sysSettingCont@pst_Editdata"));