<?php

namespace App\Http\Controllers;

use App\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'percentage_to_pass'=>'required|integer|max:100|min:0',
            'price'=>'required|integer|min:0',
            'logo'=>'file|image',
            'start_datetime'=>'required', 'end_datetime'=>'required']);

        $logoPath = "";
        if ($request->hasFile('logo')){
            $file = $request->file('logo');
            $logoName = $filename = 'course-logo-' . time() . '.' . $file->getClientOriginalExtension();
            $logoPath = $file->storeAs('courseslogo', $logoName);
        }

        $data = ['name' => $request->get('name'),
            'alternative_name' => $request->get('alternative_name'),
            'price' => $request->get('price'),
            'logo' => $logoPath,
            'percentage_to_pass' => $request->get('percentage_to_pass'),
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
        return view('courses.edit', compact('course'));
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
        $request->validate([
            'name'=>'required',
            'percentage_to_pass'=>'required|integer|max:100|min:0',
            'logo'=>'file|image',
            'start_datetime'=>'required',
            'end_datetime'=>'required']);
        $file = $request->file('logo');
        $logoName = $filename = 'course-logo-' . time() . '.' . $file->getClientOriginalExtension();
        $logoPath = $file->storeAs('courseslogo', $logoName);

        $data = ['name' => $request->get('name'),
            'alternative_name' => $request->get('alternative_name'),
            'logo' => $logoPath,
            'percentage_to_pass' => $request->get('percentage_to_pass'),
            'start_datetime' => Carbon::createFromFormat('Y/m/d H:i', $request->get('start_datetime'))->toDateTimeString(),
            'end_datetime' => Carbon::createFromFormat('Y/m/d H:i', $request->get('end_datetime'))->toDateTimeString(),
            'description' => $request->get('description')];

        $course->update($data);
        return redirect(route('courses.index'))->withSuccess('updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     * @todo delete image and course's relations
     * @todo add permissions
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Course $course)
    {
        // delete course trainers, lectures trainees attendance , lectures trainers attendance
        try{

            //Storage::delete('course-logo-' . time() . '.' .$course->logo.getClientOriginalExtension());
            $course->lectures()->delete();
            $course->delete();
            return redirect(route('courses.index'))->withSuccess('deleted successfully');
        }
        catch (\Exception $e){
            return redirect(route('courses.show', ['id'=>$course->id]))->with("error",$e->getMessage());
        }
    }
}
