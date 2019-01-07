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
        $courseTrainersIds = CourseTrainer::where('course_id', $lecture->course_id)->pluck('trainer_id')->toArray();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TrainerAttendance  $trainerAttendance
     * @return \Illuminate\Http\Response
     */
    public function show(TrainerAttendance $trainerAttendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TrainerAttendance  $trainerAttendance
     * @return \Illuminate\Http\Response
     */
    public function edit(TrainerAttendance $trainerAttendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TrainerAttendance  $trainerAttendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrainerAttendance $trainerAttendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TrainerAttendance  $trainerAttendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrainerAttendance $trainerAttendance)
    {
        //
    }
}
