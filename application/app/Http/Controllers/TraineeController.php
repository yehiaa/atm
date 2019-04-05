<?php

namespace App\Http\Controllers;

use App\Speciality;
use App\Trainee;
use Illuminate\Http\Request;

class TraineeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Trainee::all();
        return view('trainees.index', compact('items'));
    }

    public function autocomplete()
    {
        $q = request('q');

        $items = Trainee::all();
        if ($q){
            $items = Trainee::where('name', 'like', '%'.$q.'%')
                ->orWhere('phone', '%'.$q.'%')
                ->orWhere('identity', '%'.$q.'%')
                ->orWhere('email', '%'.$q.'%')
                ->get();
        }
        return response()->json($items);
    }
    public function autocompleteCity()
    {
        $q = request('q');

        $items = Trainee::all();
        if ($q){
            $items = Trainee::where('name', 'like', '%'.$q.'%')
                ->orWhere('phone', '%'.$q.'%')
                ->orWhere('identity', '%'.$q.'%')
                ->orWhere('email', '%'.$q.'%')
                ->get();
        }
        return response()->json($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialities = Speciality::all();
        return view('trainees.create', compact('specialities'));
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
            'name'=>'required|min:5',
            'email'=> 'email|unique:trainees',
            'gender'=>'required',
            'phone' => 'min:11|unique:trainees',
            'identity'=> 'required|unique:trainees',
            'identity_type'=> 'required',
            'speciality_id' => 'required']);

        $attachmentPath = "";
        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $attachmentName = $filename = 'attachment-file-' . time() . '.' . $file->getClientOriginalExtension();
            $attachmentPath = $file->storeAs('traineeAttachment', $attachmentName);
            }

        $data = ['name' => $request->get('name'),
            'gender'=>$request->get('gender'),
            'phone'=>$request->get('phone'),
            'identity_type'=>$request->get('identity_type'),
            'email'=>$request->get('email'),
            'identity'=>$request->get('identity'),
            'speciality_id'=>$request->get('speciality_id'),
            'country'=>$request->get('country'),
            'city'=>$request->get('city'),
            'attachment'=>$attachmentPath];

        Trainee::create($data);

        return redirect(route('trainees.index'))->withSuccess('created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function show(Trainee $trainee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainee $trainee)
    {
        $specialities = Speciality::all();
        return view('trainees.edit', compact('trainee', 'specialities'));
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
            'name'=>'required|min:5',
            'email'=> 'email|unique:trainees,email,'.$trainee->id,
            'gender'=>'required',
            'phone' => 'min:11|unique:trainees,phone,'.$trainee->id,
            'identity'=> 'required|unique:trainees,identity,'.$trainee->id,
            'identity_type'=> 'required',
            'speciality_id' => 'required']);

        $attachmentPath = $trainee->attachment;
        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $attachmentName = $filename = 'attachment-file-' . time() . '.' . $file->getClientOriginalExtension();
            $attachmentPath = $file->storeAs('traineeAttachment', $attachmentName);
        }

        $data = ['name' => $request->get('name'),
            'gender'=>$request->get('gender'),
            'phone'=>$request->get('phone'),
            'identity_type'=>$request->get('identity_type'),
            'email'=>$request->get('email'),
            'identity'=>$request->get('identity'),
            'speciality_id'=>$request->get('speciality_id'),
            'country'=>$request->get('country'),
            'city'=>$request->get('city'),
            'attachment'=>$attachmentPath
        ];

        $trainee->update($data);

        return redirect(route('trainees.index'))->withSuccess('updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainee $trainee)
    {
        try {
            $trainee->delete();
            return redirect(route('trainees.index'))->withSuccess('deleted successfully');
        }
        catch (\Exception $e){
            return redirect(route('trainees.index', ['id'=>$trainee->id]))->with("error","can not delete");
        }
    }

}
