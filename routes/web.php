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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('schools/search', 'SchoolController@search')->middleware('auth')->name('schools.search');
Route::resource('schools', 'SchoolController')->middleware('auth');

Route::resource('sports', 'SportController')->middleware('auth');

Route::resource('houses', 'HouseController')->middleware('auth');

Route::resource('disabilities', 'DisabilityController')->middleware('auth');

Route::resource('students', 'StudentController')->middleware('auth');

Route::resource('teachers', 'TeacherController')->middleware('auth');

Route::resource('guardians', 'GuardianController')->middleware('auth');
