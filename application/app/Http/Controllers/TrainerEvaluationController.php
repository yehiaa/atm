<?php

namespace App\Http\Controllers;

use App\Course;
use App\Trainer;
use App\TrainerEvaluation;
use App\TrainerEvaluationDetail;
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
    public function create(Course $course)
    {
        return view('trainer_evaluation.create',compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request,Course $course)
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
         "_token" => "MlwfnKSMLOp4HTsPoSOmDfcrAhmfGFIs0xaEMqso"
         "files" => "background_tree_wood_boards_texture_wooden_background_old_brown-1370487.jpg"
         "details" => array:1 [▼
          1 => array:3 [▼
               "scientific_skills" => "highly_Satisfied"
               "presentation_skills" => "highly_Satisfied"
               "communications_skills" => "highly_Satisfied" ]
         ]
        "recommendations" => null
         "additional_comments" => null
         "submit" => null ]
        'scientific_skills'=>'required',
            'presentation_skills'=>'required',
            'communications_skills'=>'required',
        */


        $trainees = $course->registrations;
        $details = $request->get('details');
        $trainerEvaluationDetails  = [];

        $filePath = "";
        if ($request->hasFile('logo')){
            $file = $request->file('logo');
            $logoName = $filename = 'trainer-evaluation-attach-' . time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('trainerEvaluationAttach', $logoName);
        }

        //$trainee_id = ;



        $trainerEvaluation = TrainerEvaluation::create(['course_id'=> $course->id, 'trainee_id' => $trainee_id, 'attache' => $filePath]);
        foreach ($details as $trainer_id => $detail)
        {
            //var_dump($detail);
            $trainerEvaluationDetail = new TrainerEvaluationDetail(['trainer_id' => $trainer_id, 'scientific_skills' => $detail['scientific_skills'], 'presentation_skills' => $detail['presentation_skills'], 'communication_skills' => $detail['communication_skills']]);
//            var_dump($trainer_id);
//            var_dump($detail); // detail contains for ex : "communications_skills" => "unsatisfied"
            $trainerEvaluation->trainerEvaluationDetail()->save($trainerEvaluationDetail);
        }

        //dd($details);

        return redirect(route('trainer_evaluation.index', $course->id));
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
