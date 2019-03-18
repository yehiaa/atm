<?php

namespace App\Http\Controllers;


use App\ProfessionalData;
use Illuminate\Http\Request;

class ProfessionalDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = ProfessionalData::all();
        return view('professional_data.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('professional_data.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required']);
        ProfessionalData::create($request->all());
        return redirect(route('professional_data.index'))->withSuccess('created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param ProfessionalData $professional_datum
     * @return void
     */
    public function show(ProfessionalData $professional_datum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ProfessionalData $professional_datum
     * @return void
     */
    public function edit(ProfessionalData $professional_datum)
    {
        return view('professional_data.edit',compact('professional_datum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param ProfessionalData $professional_datum
     * @return void
     */
    public function update(Request $request, ProfessionalData $professional_datum)
    {
        $request->validate(['name'=>'required']);
        $professional_datum->update( \request()->all());
        $professional_datum->save();

        return redirect(route('professional_data.index'))->withSuccess('updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProfessionalData $professional_datum
     * @return void
     * @throws \Exception
     */
    public function destroy(ProfessionalData $professional_datum)
    {
        $professional_datum->delete();
        return redirect(route('professional_data.index'))->withSuccess('deleted successfully');
    }
}
