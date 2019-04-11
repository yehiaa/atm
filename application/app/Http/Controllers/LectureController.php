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
            'start_datetime'=>'required|date_format:Y/m/d H:i',
            'end_datetime'=>'required|date_format:Y/m/d H:i|after:start_datetime',
            'hall_id'=>'required']);

        //@todo compare timing with course timing

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
        $halls = Hall::all();
        return view('lectures.edit', compact('course','lecture', 'halls'));
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
        $request->validate(['name'=>'required',
            'start_datetime'=>'required|date_format:Y/m/d H:i',
            'end_datetime'=>'required|date_format:Y/m/d H:i|after:start_datetime',
            'hall_id'=>'required']);

        //@todo compare lecture timings with course timings


        $data = ['name' => $request->get('name'),
            'course_id' => $course->id,
            'hall_id' => $request->get('hall_id'),
            'start_datetime' => Carbon::createFromFormat('Y/m/d H:i', $request->get('start_datetime'))->toDateTimeString(),
            'end_datetime' => Carbon::createFromFormat('Y/m/d H:i', $request->get('end_datetime'))->toDateTimeString(),
            'notes' => $request->get('notes')];

        $lecture->update($data);
        return redirect(route('courses.show', ['id'=>$course->id]))->withSuccess('updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, Lecture $lecture)
    {
        try{
            $lecture->delete();
        return redirect(route('courses.show', ['id'=>$course->id]))->withSuccess('deleted successfully');
        }
        catch (\Exception $e){
            return redirect(route('courses.show', ['id'=>$course->id]))->with("error", "unable to delete");
        }
    }
}
