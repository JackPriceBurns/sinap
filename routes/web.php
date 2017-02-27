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

# Pages

Route::get('/', 'PagesController@home');
Route::get('login', 'PagesController@login');

# Login Controller

Route::post('login', 'LoginController@login');
Route::get('logout', 'LoginController@logout');

# User Controller

Route::get('user', 'UserController@index');
Route::get('user/{id}', 'UserController@user');

# Overview Controller

Route::get('overview', 'OverviewController@overview');

# Manage Controller

Route::get('manage/badges', 'ManageController@badges')->middleware("teacher");
Route::get('manage/students', 'ManageController@students')->middleware("teacher");
Route::get('manage/students/{args}', 'ManageController@students')->middleware("teacher");
Route::get('manage/teachers', 'ManageController@teachers')->middleware("admin");
Route::get('manage/classes', 'ManageController@classes')->middleware("teacher");
Route::get('manage/sessions', 'ManageController@sessions')->middleware("admin");
Route::get('manage/widgets', 'ManageController@widgets');

# Class Controller

Route::get('class', 'ClassController@index');