<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseTrainer;
use App\Trainer;
use Illuminate\Http\Request;

class CourseTrainerController extends Controller
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
     * @param Course $course
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        $trainers = Trainer::all();
        return view('trainers.course-create', compact('course', 'trainers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Course $course
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Course $course)
    {
        $request->validate(['course_id'=>'required',
            'trainer_id'=>'required']);

        $exist = CourseTrainer::where('course_id', $request->get('course_id'))
                                    ->where('trainer_id', $request->get('trainer_id'))->get();

        if ($exist->count() > 0) {
            return redirect(route('courses.show', ['id'=>$course->id]))->withError('trainer already assigned to this course');
        }
        CourseTrainer::create($request->all());
        return redirect(route('courses.show', ['id'=>$course->id]))->withSuccess('created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourseTrainer  $courseTrainer
     * @return \Illuminate\Http\Response
     */
    public function show(CourseTrainer $courseTrainer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourseTrainer  $courseTrainer
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseTrainer $courseTrainer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseTrainer  $courseTrainer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseTrainer $courseTrainer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Course $course
     * @param Trainer $trainer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course , Trainer $trainer)
    {
        $course->trainers()->detach($trainer->id);
        return redirect(route('courses.show', [$course->id]))->withSuccess('deleted successfully');
    }
}
