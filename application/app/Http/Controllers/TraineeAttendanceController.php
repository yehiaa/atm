<?php

namespace App\Http\Controllers;

use App\Trainee;
use App\Lecture;
use App\TraineeAttendance;
use App\CourseRegistration;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class TraineeAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Lecture $lecture)
    {
        $courseTraineeIds = CourseRegistration::where('course_id', $lecture->course_id)->pluck('trainee_id')->toArray();
        $traineesAttendance = TraineeAttendance::where('lecture_id', $lecture->id)->get();
        $trainees = Trainee::whereIn('id', $courseTraineeIds)->whereNotIn('id', $traineesAttendance->pluck('trainee_id')->toArray() )->get();
        return view('trainees_attendance.create', compact('trainees', 'lecture', 'traineesAttendance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Lecture $lecture
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Lecture $lecture)
    {
        if (TraineeAttendance::where('lecture_id', $lecture->id)->where('trainee_id', $request->get('trainee_id'))->count() > 0)
        {
            return redirect(route('lectures.trainees-attendance.index', [$lecture->id]))->withErrors('trainee already attended');
        }

        $request->validate(['trainee_id'=>'required']);

        $traineeAttendance = TraineeAttendance::create([
            'lecture_id' => $lecture->id,
            'created_by' => auth()->user()->id,
            'attended_at' => (new \DateTime())->format('Y-m-d H:i:s'),
            'trainee_id' => $request->get('trainee_id')]);

        return redirect(route('lectures.trainees-attendance.index', [$lecture->id]))->withSuccess('created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TraineeAttendance  $traineeAttendance
     * @return \Illuminate\Http\Response
     */
    public function show(TraineeAttendance $traineeAttendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TraineeAttendance  $traineeAttendance
     * @return \Illuminate\Http\Response
     */
    public function edit(TraineeAttendance $traineeAttendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TraineeAttendance  $traineeAttendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TraineeAttendance $traineeAttendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Lecture $lecture
     * @param TraineeAttendance $trainees_attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecture $lecture, TraineeAttendance $trainees_attendance)
    {
        try{
            $trainees_attendance->delete();
            return redirect(route('lectures.trainees-attendance.index', [$lecture->id]))->withSuccess('deleted successfully');

        }catch (Exception $ex){
            return redirect(route('lectures.trainees-attendance.index', [$lecture->id]))->withError('can not delete related record');
        }
    }
}
