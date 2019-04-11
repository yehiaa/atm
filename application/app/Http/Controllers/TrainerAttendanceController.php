<?php

namespace App\Http\Controllers;

use App\Lecture;
use App\Trainer;
use App\TrainerAttendance;
use App\CourseTrainer;
use Illuminate\Http\Request;

class TrainerAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Lecture $lecture)
    {
        $courseTrainersIds = CourseTrainer::where('course_id', $lecture->course_id)->pluck('trainer_id');
        $trainers = Trainer::whereIn('id', $courseTrainersIds)->get();
        $trainersAttendance = TrainerAttendance::where('lecture_id', $lecture->id)->get();
        return view('trainers_attendance.create', compact('trainers', 'lecture', 'trainersAttendance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Lecture $lecture
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */

    public function store(Request $request, Lecture $lecture)
    {
        if (TrainerAttendance::where('lecture_id', $lecture->id)->where('trainer_id', $request->get('trainer_id'))->count() > 0)
        {
            return redirect(route('lectures.trainers-attendance.index', [$lecture->id]))->withErrors('trainer already attended');
        }

        $request->validate(['trainer_id'=>'required']);

        //@todo add timing validation

        $traineeAttendance = TrainerAttendance::create([
            'lecture_id' => $lecture->id,
            'created_by' => auth()->user()->id,
            'attended_at' => (new \DateTime())->format('Y-m-d H:i:s'),
            'trainer_id' => $request->get('trainer_id')]);

        return redirect(route('lectures.trainers-attendance.index', [$lecture->id]))->withSuccess('assigned successfully');
    }
    /**
     * Display the specified resource.
     * @param  \App\TrainerAttendance  $trainers_attendance
     * @return \Illuminate\Http\Response
     */
    public function show(TrainerAttendance $trainers_attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Lecture $lecture
     * @param  \App\TrainerAttendance $trainer_attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecture $lecture, TrainerAttendance $trainer_attendance)
    {
        $courseTrainersIds = CourseTrainer::where('course_id', $lecture->course_id)->pluck('trainer_id')->toArray();
        $trainers = Trainer::whereIn('id', $courseTrainersIds)->get();
        //$trainer_attendance = TrainerAttendance::where('lecture_id', $lecture->id)->get();
        return view('trainers_attendance.edit', compact('trainers', 'lecture', 'trainer_attendance'));
       // return view('trainers_attendance.edit', compact('trainers', 'lecture', 'trainerAttendance'));
    }

    /**
     * Update the specified resource in storage
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TrainerAttendance  $trainers_attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrainerAttendance $trainers_attendance)
    {
        //this won't work
        $request->vaildate([
            'lecture_id' =>'require',
            'created_by'=>'require',
            'attended_at' =>'require', // needs to be formatted
            'trainer_id' =>'require'
        ]);

        //@todo add timing validation

        $trainers_attendance->update( $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Lecture $lecture
     * @param TrainerAttendance $trainers_attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecture $lecture, TrainerAttendance $trainers_attendance)
    {
        $trainers_attendance->delete();
        return redirect(route('lectures.trainers-attendance.index', [$lecture->id]))->withSuccess('deleted successfully');
    }
}
