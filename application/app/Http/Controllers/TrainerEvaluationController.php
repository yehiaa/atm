<?php

namespace App\Http\Controllers;

use App\Course;
use App\Trainer;
use Illuminate\Http\Request;

class trainerEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Course $course)
    {

        return view('trainer_evaluation.index', compact('course'));
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
        /*
         "details" => array:2 [▼
            1 => array:2 [▼
            "scientific_skills" => "unsatisfied"
            "communications_skills" => "highly_Satisfied"
            ]
            2 => array:1 [▼
            "communications_skills" => "unsatisfied"
            ]
            ]
        */
        dd($request->all());
        //details is an associative array the keys are the trainer ids
        $details = $request->get('details');
        foreach ($details as $trainer_id => $detail)
        {
            var_dump($trainer_id);
            var_dump($detail); // detail contains for ex : "communications_skills" => "unsatisfied"

        }
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
    public function destroy($id)
    {
        //
    }
}
