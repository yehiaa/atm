<?php

namespace App\Http\Controllers;

use App\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Course::all();
        return view('courses.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required',
            'alternative_name'=>'required',
            'start_datetime'=>'required', 'end_datetime'=>'required']);
        dump($request->get('start_datetime'));

//        exit();
//        Carbon::createFromFormat('Y/mm/dd HH:MM', $request->get('start_datetime'))->toAtomString();

//        exit(Carbon::createFromFormat('Y/m/d H:i', $request->get('start_datetime'))->toAtomString());

        $data = ['name' => $request->get('name'),
            'alternative_name' => $request->get('alternative_name'),
            'start_datetime' => Carbon::createFromFormat('Y/m/d H:i', $request->get('start_datetime'))->toDateTimeString(),
            'end_datetime' => Carbon::createFromFormat('Y/m/d H:i', $request->get('end_datetime'))->toDateTimeString(),
            'description' => $request->get('description')];

        Course::create($data);
        return redirect(route('courses.index'))->withSuccess('created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
