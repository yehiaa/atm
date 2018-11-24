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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/calendar', 'CalendarController@index')->name('calendar');
Route::get('/course-registration', 'CourseRegistrationController@create')->name('course_registration.create');
//Route::get('/trainers', 'TrainerController@index')->name('trainers_index');
Route::resource('/users', 'UserController');
Route::resource('/halls', 'HallController');
Route::resource('/courses', 'CourseController');
Route::resource('/lectures', 'LectureController');
Route::resource('/trainers', 'TrainerController');
Route::resource('/trainees', 'TraineeController');
Route::resource('/nominations', 'NominationController');
Route::resource('/specialties', 'SpecialityController');
