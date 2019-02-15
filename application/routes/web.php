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
Route::group(['middleware' => 'auth'], function()
{
    Route::get('/evaluation', 'EvaluationController@index')->name('evaluations.index');
    Route::get('/evaluation/{course}/create', 'EvaluationController@create')->name('evaluations.create');
    Route::get('/logout', 'Auth\LoginController@logout');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/calendar', 'CalendarController@index')->name('calendar');
    Route::get('/course-registration', 'CourseRegistrationController@create')->name('course_registration.create');
    Route::post('/course-registration', 'CourseRegistrationController@store')->name('course_registration.store');
    //Route::get('/trainers', 'TrainerController@index')->name('trainers_index');
    Route::resource('/users', 'UserController');
    Route::resource('/halls', 'HallController');
    Route::resource('/courses', 'CourseController');
    Route::resource('/courses.lectures', 'LectureController');
    Route::resource('/courses.trainers', 'CourseTrainerController');

    Route::resource('/lectures.trainers-attendance', 'TrainerAttendanceController');
    Route::resource('/lectures.trainees-attendance', 'TraineeAttendanceController');

    Route::resource('/trainers', 'TrainerController');

    Route::get('/api/trainees', 'API\TraineeApiController@index')->name('api_trainees');

    Route::resource('/trainees', 'TraineeController');
    Route::resource('/affiliations', 'AffiliationController');
    Route::resource('/university_affiliations', 'UniversityAffiliationController');
    Route::resource('/professional_data', 'ProfessionalDataController');
    Route::resource('/specialties', 'SpecialityController');
});
