<?php

namespace App\Http\Controllers;

use App\Course;
use App\Trainer;
use App\TrainerEvaluation;
use App\TrainerEvaluationDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

        $request->validate([
            'trainee_id'=>'required',
            'attachment'=>'file|image'
        ]);
        $details = $request->get('details');
        $trainerEvaluationDetails  = [];

        foreach ($details as $trainer_id => $detail)
        {
            $detail['trainer_id'] = $trainer_id;
            $validator = Validator::make($detail, [
                'scientific_skills' => 'required',
                'presentation_skills' => 'required',
                'communication_skills' => 'required',
                'trainer_id' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect(route('trainer_evaluation.create', $course->id))
                    ->withErrors($validator)
                    ->withInput();
            }

            $trainerEvaluationDetails [] = new TrainerEvaluationDetail($detail);
        }

        $filePath = "";
        //handle the file upload here ...

        $trainerEvaluation = TrainerEvaluation::create(['course_id'=> $course->id, 'trainee_id' => $request->get('trainee_id'), 'attache' => $filePath]);

        // we can use saveMany also.
        // https://laravel.com/docs/5.8/eloquent-relationships#inserting-and-updating-related-models
        foreach ($trainerEvaluationDetails as $trainerEvaluationDetail)
        {
            $trainerEvaluation->trainerEvaluationDetail()->save($trainerEvaluationDetail);
        }
        // we redirect to create . we should instead redirect to index.
        return redirect(route('trainer_evaluation.create', $course->id))->withSuccess("created successfully");
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
