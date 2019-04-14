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
    Route::resource('roles','RoleController');
    Route::resource('permissions','PermissionController');

    //Route::get('/evaluation', 'EvaluationController@index')->name('evaluations.index');
    //Route::get('/evaluation/{course}/create', 'EvaluationController@create')->name('evaluations.create');
    //Route::get('/evaluation/course_evaluation', 'EvaluationController@create')->name('course_evaluation.create');
    //Route::get('/evaluation/trainer_evaluation', 'EvaluationController@create')->name('trainer_evaluation.create');
    //Route::get('/evaluation/trainee_assessment', 'EvaluationController@create')->name('trainee_assessment.create');

    //Route::resource('course-evaluation','CourseEvaluationController');

    Route::get('/courses/{course}/course-evaluation', 'CourseEvaluationController@index')->name('course_evaluation.index');
    Route::get('/courses/{course}/course-evaluation/create', 'CourseEvaluationController@create')->name('course_evaluation.create');
    Route::post('/courses/{course}/course-evaluation', 'CourseEvaluationController@store')->name('course_evaluation.store');
    Route::get('/courses/{course}/course-evaluation/{course_evaluation}', 'CourseEvaluationController@show')->name('course_evaluation.show');
    Route::delete('/courses/{course}/course-evaluation/{course_evaluation}', 'CourseEvaluationController@destroy')->name('course_evaluation.destroy');

    Route::resource('/courses/{course}/trainer_evaluation','TrainerEvaluationController');
    Route::resource('/courses/{course}/trainee_assessment','TraineeAssessmentController');

    Route::get('/logout', 'Auth\LoginController@logout');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/calendar', 'CalendarController@index')->name('calendar');

    //Route::get('/course-registration', 'CourseRegistrationController@create')->name('course_registration.create');
    Route::get('/courses/{course}/course-registration', 'CourseRegistrationController@index')->name('course_registration.index');
    Route::get('/course-registration/create', 'CourseRegistrationController@create')->name('course_registration.create');
    Route::post('/course-registration', 'CourseRegistrationController@store')->name('course_registration.store');
    Route::get('/courses/{course}/course-registration/{course_registration}', 'CourseRegistrationController@show')->name('course_registration.show');
    Route::get('/courses/{course}/course-registration/{course_registration}/edit', 'CourseRegistrationController@edit')->name('course_registration.edit');
    Route::patch('/courses/{course}/course-registration/{course_registration}', 'CourseRegistrationController@update')->name('course_registration.update');
    Route::delete('/courses/{course}/course-registration/{course_registration}', 'CourseRegistrationController@destroy')->name('course_registration.destroy');

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
