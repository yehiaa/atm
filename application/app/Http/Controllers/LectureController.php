<?php

namespace App\Http\Controllers;

use App\Course;
use App\Hall;
use App\Lecture;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Lecture::all();
        return view('lectures.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        $halls = Hall::all();
        return view('lectures.create', compact('course', 'halls'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Course $course)
    {
//        return $course;
        $request->validate(['name'=>'required',
            'start_datetime'=>'required',
            'end_datetime'=>'required',
            'hall_id'=>'required']);

        $data = ['name' => $request->get('name'),
            'course_id' => $course->id,
            'hall_id' => $request->get('hall_id'),
            'start_datetime' => Carbon::createFromFormat('Y/m/d H:i', $request->get('start_datetime'))->toDateTimeString(),
            'end_datetime' => Carbon::createFromFormat('Y/m/d H:i', $request->get('end_datetime'))->toDateTimeString(),
            'notes' => $request->get('notes')];

        Lecture::create($data);
        return redirect(route('courses.show', ['id'=>$course->id]))->withSuccess('created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course, Lecture $lecture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Lecture $lecture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course, Lecture $lecture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, Lecture $lecture)
    {
        //
    }
}
