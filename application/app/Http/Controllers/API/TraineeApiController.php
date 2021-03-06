<?php

namespace App\Http\Controllers\API;

use App\Trainee;
use Illuminate\Http\Request;

class TraineeApiController extends APIController
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $q = $request->query('q');
        $items = [];
        if ($q){
            $items = Trainee::orWhere('name', 'like', '%'.$q.'%')
                ->orWhere('phone', 'like', '%'.$q.'%')
                ->orWhere('identity', 'like', '%'.$q.'%')
                ->orWhere('email', 'like', '%'.$q.'%')
                ->get();
        }

        return response()->json($items);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:5', 'email'=> 'email|unique:trainees',
            'gender'=>'required',
            'phone' => 'min:11|unique:trainees', 'identity'=> 'required|unique:trainees',
            'identity_type'=> 'required', 'speciality_id' => 'required']);
        $trainee = Trainee::create($request->all());
        return response()->json($trainee);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function show(Trainee $trainee)
    {
        return response()->json($trainee);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainee $trainee)
    {
        $request->validate([
            'name'=>'required|min:5', 'email'=> 'email|unique:trainees,email,'.$trainee->id,
            'gender'=>'required',
            'phone' => 'min:11|unique:trainees,phone,'.$trainee->id, 'identity'=> 'required|unique:trainees,identity,'.$trainee->id,
            'identity_type'=> 'required', 'speciality_id' => 'required']);

        $trainee->update($request->all());
        return response()->json($trainee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainee $trainee)
    {
        //
    }

}
