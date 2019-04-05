<?php

namespace App\Http\Controllers;

use App\TraineeAssessment;
use Illuminate\Http\Request;
use App\Course;
use Illuminate\Support\Facades\DB;
class traineeAssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Course $course)
    {
//      $items = TraineeAssessment::all();// this will return ALL trainee assessments regardless of the course
        $items = $course->traineeAssessments;
        return view('trainee_assessment.index', compact('course','items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        $trainees = DB::table('trainees')
            ->join('course_registration','trainees.id','=','trainee_id'  )
            ->join('courses',  'course_registration.course_id','=', 'courses.id')
            ->where('courses.id', $course->id)
            ->select( 'trainees.*','trainees.name as trainee_name', 'courses.name as course_name')
            ->get();
        return view('trainee_assessment.create', compact('course','trainees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Course $course)
    {
        $request->validate(['course_id'=>'required',
            'trainee_id'=>'required',
            'pretest'=>'required',
            'posttest'=>'required',
            'improvement'=>'required',
            'average_trainee_satisfaction'=>'required',
            'attachment'=>'file|image'
        ]);


        TraineeAssessment::create($request->all());
        return redirect(route('trainee_assessment.index',[$course->id]))->withSuccess('created successfully');
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

    public function destroy(Course $course, TraineeAssessment $trainee_assessment)
    {
        try{
            $trainee_assessment->delete();
            return redirect(route('trainee_assessment.index',[$course->id]))->withSuccess('deleted successfully');
        } catch (\Exception $e){
            return redirect(route('trainee_assessment.index',[$course->id]))->with("error",'can not delete');
        }
    }


}
