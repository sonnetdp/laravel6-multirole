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

Route::get('/',['uses'=>'HomeController@index','roles'=>['Admin','Manager']]);
Route::get('home',['uses'=>'HomeController@index','roles'=>['Admin','Manager']]);
Route::get('role/assign',['uses'=>'HomeController@showRoleAssignPage','roles'=>['Admin']]);
Route::post('role/assign', ['uses'=>'AppController@postAdminAssignRoles','roles'=>['Admin']]);
