<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseEvaluation;
use App\Trainee;
use Illuminate\Http\Request;

class courseEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Course $course)
    {
        return view('evaluation.course_evaluation', compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * Course $course, Trainee $trainee
     * ,
     */

    public function create(Course $course,Trainee $trainee)
    {
        $courses = Course::all();
        return view('evaluation.course_evaluation', compact('courses' ,'course','trainee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $count = CourseEvaluation::where('trainee_id', $request->get('trainee_id'))->where('course_id', $request->get('course_id'))->count();
        if ($count > 0){
            return redirect(route('course_evaluation.create'))
                ->withErrors('trainee already evaluate the course ')->withInput();
        }
        $request->validate(['course_id'=>'required',
            'trainee_id'=>'required',
            'organization'=>'required',
            'educational_tools'=>'required',
            'cofee_break'=>'required',
            'overall_evaluation'=>'required'
           ]);
        CourseEvaluation::create($request->all());

        return redirect(route('course_evaluation.create'))->withSuccess('created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
