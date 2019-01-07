<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseRegistration;
use App\Nomination;
use App\Trainee;
use App\User;
use Illuminate\Http\Request;

class CourseRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $trainees = Trainee::all();
        $nominations= Nomination::all();
        return view('course_registration.create', compact('courses', 'trainees', 'nominations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count = CourseRegistration::where('trainee_id', $request->get('trainee_id'))->where('course_id', $request->get('course_id'))->count();
        if ($count > 0){
            return redirect(route('course_registration.create'))->withErrors('trainee already registered');
        }
        $request->merge(['created_by'=> auth()->user()->id]);
        $request->merge(['payment_by'=> auth()->user()->id]);
        $request->merge(['payment_at'=> (new \DateTIme())->format('Y-m-d H:i:s')]);
//        $request->merge(['created_by'=> auth()->user()->id]);
        $courseRegistration = CourseRegistration::create($request->all());

        return redirect(route('course_registration.create'))->withSuccess('created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourseRegistration  $courseRegistration
     * @return \Illuminate\Http\Response
     */
    public function show(CourseRegistration $courseRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourseRegistration  $courseRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseRegistration $courseRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseRegistration  $courseRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseRegistration $courseRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseRegistration  $courseRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseRegistration $courseRegistration)
    {
        //
    }
}
