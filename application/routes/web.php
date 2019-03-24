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

/*POST      | course-registration                        | course-registration.store | App\Http\Controllers\CourseRegistrationController@store                | web,auth     |
GET|HEAD  | course-registration                        | course-registration.index | App\Http\Controllers\CourseRegistrationController@index                | web,auth     |
GET|HEAD  | course-registration/create                 | course-registration.create| App\Http\Controllers\CourseRegistrationController@create               | web,auth     |
DELETE    | course-registration/{course_registration}  | course-registration.destroy | App\Http\Controllers\CourseRegistrationController@destroy              | web,auth     |
PUT|PATCH | course-registration/{course_registration}  | course-registration.update  | App\Http\Controllers\CourseRegistrationController@update               | web,auth     |
GET|HEAD  | course-registration/{course_registration}/edit | course-registration.edit| App\Http\Controllers\CourseRegistrationController@edit                 | web,auth     |
GET|HEAD  | course-registration/{course_registration}  | course-registration.show    | App\Http\Controllers\CourseRegistrationController@show                 | web,auth     |
*/
    //Route::get('/course-registration', 'CourseRegistrationController@create')->name('course_registration.create');
    Route::get('/course-registration', 'CourseRegistrationController@index')->name('course_registration.index');
    Route::get('/course-registration/create', 'CourseRegistrationController@create')->name('course_registration.create');
    Route::post('/course-registration', 'CourseRegistrationController@store')->name('course_registration.store');
    Route::get('/course-registration/{course_registration}', 'CourseRegistrationController@show')->name('course_registration.show');
    Route::get('/course-registration/{course_registration}/edit', 'CourseRegistrationController@edit')->name('course_registration.edit');
    Route::patch('/course-registration/{course_registration}', 'CourseRegistrationController@update')->name('course_registration.update');
    Route::delete('/course-registration/{course_registration}', 'CourseRegistrationController@destroy')->name('course_registration.destroy');

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
    Route::post('/api/trainees', 'API\TraineeApiController@store')->name('api_trainees_store');

    Route::resource('/trainees', 'TraineeController');
    Route::resource('/affiliations', 'AffiliationController');
    Route::resource('/university_affiliations', 'UniversityAffiliationController');
    Route::resource('/professional_data', 'ProfessionalDataController');
    Route::resource('/specialities', 'SpecialityController');
});
