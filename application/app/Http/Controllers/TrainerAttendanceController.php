<?php

namespace App\Http\Controllers;

use App\Lecture;
use App\Trainer;
use App\TrainerAttendance;
use App\CourseTrainer;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

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

    public function store(Request $request, Lecture $lecture)
    {
        if (TrainerAttendance::where('lecture_id', $lecture->id)->where('trainer_id', $request->get('trainer_id'))->count() > 0)
        {
            return redirect(route('lectures.trainers-attendance.index', [$lecture->id]))->withErrors('trainer already attended');
        }
        $traineeAttendance = TrainerAttendance::create([
            'lecture_id' => $lecture->id,
            'created_by' => auth()->user()->id,
            'attended_at' => (new \DateTime())->format('Y-m-d H:i:s'),
            'trainer_id' => $request->get('trainer_id')]);
    }
    /**
     * Display the specified resource.
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
    public function edit(TrainerAttendance $trainerAttendance ,Lecture $lecture)
    {
        $courseTrainersIds = CourseTrainer::where('course_id', $lecture->course_id)->pluck('trainer_id')->toArray();
        $trainers = Trainer::whereIn('id', $courseTrainersIds)->get();
        $trainersAttendance = TrainerAttendance::where('lecture_id', $lecture->id)->get();
        return view('trainers_attendance.edit', compact('trainers', 'lecture', 'trainerAttendance'));
       // return view('trainers_attendance.edit', compact('trainers', 'lecture', 'trainerAttendance'));
    }

    /**
     * Update the specified resource in storage
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TrainerAttendance  $trainerAttendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrainerAttendance $trainerAttendance)
    {
        $request->vaildate([
            'lecture_id' =>'require',
            'created_by'=>'require',
            'attended_at' =>'require',
            'trainer_id' =>'require'
        ]);

        $trainerAttendance->update( $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TrainerAttendance  $trainerAttendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecture $lecture,  $trainers_attendance_id)
    {
        $lecture->trainersAttendance->detach($trainers_attendance_id);
        // lectures/{lecture}/trainers-attendance/{trainers_attendance}
        var_dump([$trainers_attendance_id, $lecture->id]);
        //exit();
        return redirect(route('lectures.trainers-attendance.index', [$lecture->id]))->withSuccess('deleted');
    }
}

/*
 * try {

            $courseTrainersId = CourseTrainer::where('course_id', $lecture->course_id)->pluck('trainer_id')->toArray();
            $trainers = Trainer::whereIn('id', $courseTrainersId)->get();
            $trainersAttendance = TrainerAttendance::where('lecture_id', $lecture->id)->get();
            $trainersAttendance->destroy();

            return redirect(route('lectures.trainers-attendance.index', [$lecture->id]))->withSuccess('Deleted');
        }catch (Exception $e){
            return redirect(route('lectures.trainers-attendance.index',[ $lecture->id]))->with("error",$e->getMessage());
        }
        //return redirect(route('lectures.trainers-attendance.index',[ $trainerAttendance->lecture->id]))->with("error");

          try{if (TrainerAttendance::where('lecture_id', $lecture->id)->where('trainer_id', $request->get('trainer_id'))->count() > 0)$e->getMessage()
        {
            return redirect(route('lectures.trainers-attendance.index', [$lecture->id]))->withErrors('trainer already attended');
        }
        $trainerAttendance->delete()::where('lecture_id',$trainerAttendance->lecture->id)->where('trainer_id',Request()->get('trainer_id'));

             return redirect(route('lectures.trainers-attendance.index',[$trainerAttendance->lecture->id]))->withSuccess('created successfully');
        }
        catch (Exception $e){
            return redirect(route('lectures.trainers-attendance.index',[ $trainerAttendance->lecture->id]))->with("error",$e->getMessage());
        }
 */
