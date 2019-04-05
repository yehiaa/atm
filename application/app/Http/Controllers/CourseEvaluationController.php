<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\CourseEvaluation;
use App\Trainee;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class courseEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//
    public function index(Course $course)
    {
        return view('course_evaluation.index', compact('course'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * Course $course, Trainee $trainee
     * ,
     */

    public function create(Course $course)
    {
        /*$trainees = $course->trainees;
        $items = DB::table('course_registration')
            ->join('courses','course_registration.course_id','=','courses.id'  )
            ->join('trainees',  'course_registration.trainee_id','=', 'trainees.id')
            ->join('affiliations','course_registration.affiliation_id','=','affiliations.id')
            ->where('courses.id', $course->id)
            ->select('course_registration.*', 'trainees.name as trainee_name', 'courses.name as course_name', 'affiliations.name as affiliation_name')
            ->get();
            SELECT course_evaluations.*,trainees.name, courses.name
            FROM course_evaluations
            JOIN courses ON course_evaluations.course_id = courses.id
            JOIN trainees on trainees.id = course_evaluations.trainee_id
            WHERE trainee_id = 1

        SELECT trainees.name, courses.name
        FROM trainees
        JOIN course_registration ON trainee_id=trainees.id
        JOIN courses on course_registration.course_id = courses.id
        WHERE courses.id = 9;
        */
        $trainees = DB::table('trainees')
            ->join('course_registration','trainees.id','=','trainee_id'  )
            ->join('courses',  'course_registration.course_id','=', 'courses.id')
            ->where('courses.id', $course->id)
            ->select( 'trainees.*','trainees.name as trainee_name', 'courses.name as course_name')
            ->get();
        //dd($trainees);
        return view('course_evaluation.create', compact('trainees','course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request, Course $course)
    {
        $request->validate(['course_id'=>'required',
            'trainee_id'=>'required',
            'organization'=>'required',
            'educational_tools'=>'required',
            'cofee_break'=>'required',
            'overall_evaluation'=>'required',
            'attachment'=>'file|image'
           ]);
        $attachmentPath = "";
        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $attachmentName = $filename = 'course-evaluation-attachment-' . time() . '.' . $file->getClientOriginalExtension();
            $attachmentPath = $file->storeAs('courseEvaluationAttachment', $attachmentName);
        }

        $data = ['course_id' => $request->get('course_id'),
            'trainee_id'=>$request->get('trainee_id'),
            'organization'=>$request->get('organization'),
            'educational_tools'=>$request->get('educational_tools'),
            'cofee_break'=>$request->get('cofee_break'),
            'overall_evaluation'=>$request->get('overall_evaluation'),
            'attachment'=>$attachmentPath
        ];

        CourseEvaluation::create($data);
        return redirect(route('course_evaluation.index',[$course->id]))->withSuccess('created successfully');

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
    public function destroy(Course $course, CourseEvaluation $course_evaluation)
    {
        try{
             $course_evaluation->delete();
        return redirect(route('course_evaluation.index',[$course->id]))->withSuccess('deleted successfully');
        } catch (\Exception $e){
                return redirect(route('course_evaluation.index',[$course->id]))->with("error",'can not delete');
            }
        }

    }
