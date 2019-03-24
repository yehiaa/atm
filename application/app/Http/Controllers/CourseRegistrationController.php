<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseTrainer;
use App\Lecture;
use App\CourseRegistration;
use App\Affiliation;
use App\Speciality;
use App\Trainee;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
       $items = DB::table('course_registration')
            ->join('courses','course_registration.course_id','=','courses.id'  )
            ->join('trainees',  'course_registration.trainee_id','=', 'trainees.id')
            ->join('affiliations','course_registration.affiliation_id','=','affiliations.id')
            ->select('course_registration.*', 'trainees.name as trainee_name', 'courses.name as course_name', 'affiliations.name as affiliation_name')
            ->get();
       // $items = CourseRegistration::where('trainee_id', 'course_registration.trainee_id')->where('course_id','course_registration.course_id')->get();

        return view('course_registration.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $affiliations = Affiliation::all();
        $specialities = Speciality::all();
        return view('course_registration.create', compact('courses', 'affiliations', 'specialities'));
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
            return redirect(route('course_registration.create'))
                ->withErrors('trainee already registered')->withInput();
        }
        $request->merge(['created_by'=> auth()->user()->id]);
        $request->merge(['payment_by'=> auth()->user()->id]);
        $request->merge(['payment_at'=> (new \DateTIme())->format('Y-m-d H:i:s')]);


        $request->validate(['course_id'=>'required',
                            'trainee_id'=>'required',
                            'payment_type'=>'required',
                            'affiliation_id'=>'required',
                            'reference'=>'required']);

//        if ($request->get('payment_type') == CourseRegistration::PAYMENT_TYPE_AFFILIATION )
//        {
//            $request->validate(['affiliation_id'=>'required', 'nomination_reference'=>'required']);
//        }

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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourseRegistration  $courseRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseRegistration $courseRegistration)
    {

    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseRegistration  $courseRegistration
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, CourseRegistration $courseRegistration)
    {

    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\CourseRegistration  $courseRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseRegistration $courseRegistration)
    {

    }
}
