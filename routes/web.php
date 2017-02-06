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

Route::get('/', 'PagesController@home');

Route::get('login', 'PagesController@login');
Route::post('login', 'LoginController@login');

Route::get('logout', 'LoginController@logout');

Route::get('user', 'UserController@index');
Route::get('user/{id}', 'UserController@user');

// Student Area
Route::get('student/overview', 'StudentController@overview')->middleware('student');

// Teacher Area
Route::get('teacher/overview', 'TeacherController@overview')->middleware('teacher');

// Admin Area
Route::get('admin/overview', 'AdminController@overview')->middleware('admin');