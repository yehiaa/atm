<?php

namespace App\Http\Controllers;

use App\ProfessionalData;
use App\Speciality;
use App\Trainer;
use App\UniversityAffiliation;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Trainer::all();
        return view('trainers.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialities = Speciality::all();
        $universityAffiliations = UniversityAffiliation::all();
        $professionalData = ProfessionalData::all();
        return view('trainers.create', compact(['specialities', 'universityAffiliations', 'professionalData']));
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
            'name'=>'required|min:5|unique:trainers',
            'email'=> 'email|unique:trainers',
            'phone' => 'min:11|unique:trainers',
            'identity'=> 'required|unique:trainers',
            'identity_type'=> 'required',
            'speciality_id' => 'required',
            'university_affiliation_id' => 'required',
            'professional_data_id' => 'required'
        ]);
        $file = $request->file('attachment');
        $attachmentName = $filename = 'attachment-file-' . time() . '.' . $file->getClientOriginalExtension();
        $attachmentPath = $file->storeAs('trainerAttachment', $attachmentName);

        Trainer::create($request->all());
        return redirect(route('trainers.index'))->withSuccess('created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function show(Trainer $trainer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer)
    {
        $specialities = Speciality::all();
        $universityAffiliations = UniversityAffiliation::all();
        $professionalData = ProfessionalData::all();
        return view('trainers.edit', compact(['trainer','specialities', 'universityAffiliations', 'professionalData']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainer)
    {
        $request->validate([
            'name'=>'required|min:5|unique:trainers,name,'. $trainer->id,
            'email'=> 'email|unique:trainers,email,'.$trainer->id,
            //'email'=> 'email|unique:trainers ,email,'. $trainer->id,
            'phone' => 'min:11|unique:trainers,phone,'.$trainer->id,
            'identity'=> 'required|unique:trainers,identity,'.$trainer->id,
            'identity_type'=> 'required',
            'speciality_id' => 'required',
            'university_affiliation_id' => 'required',
            'professional_data_id' => 'required'
        ]);
        $file = $request->file('attachment');
        $attachmentName = $filename = 'attachment-file-' . time() . '.' . $file->getClientOriginalExtension();
        $attachmentPath = $file->storeAs('trainerAttachment', $attachmentName);
        $trainer->update($request->all());
        return redirect(route('trainers.index'))->withSuccess('updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainer $trainer)
    {
        try {
            $trainer->delete();
            return redirect(route('trainers.index'))->withSuccess('deleted successfully');
        }
        catch (\Exception $e){
            return redirect(route('trainers.index', ['id'=>$trainer->id]))->with("error",$e->getMessage());
        }
    }
}
