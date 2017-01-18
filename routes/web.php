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

// Student Area
Route::get('student/overview', 'StudentController@overview');

// Teacher Area
Route::get('teacher/overview', 'TeacherController@overview');

// Admin Area
Route::get('admin/overview', 'AdminController@overview');