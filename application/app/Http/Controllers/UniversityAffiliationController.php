<?php

namespace App\Http\Controllers;

use App\Hall;
use App\UniversityAffiliation;
use Illuminate\Http\Request;

class UniversityAffiliationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = UniversityAffiliation::all();
        return view('university_affiliation.index', compact('items'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('university_affiliation.create');
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
        UniversityAffiliation::create($request->all());
        return redirect(route('university_affiliations.index'))->withSuccess('created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function show(UniversityAffiliation $universityAffiliation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function edit(UniversityAffiliation $universityAffiliation)
    {
        return view('university_affiliation.edit',compact('universityAffiliation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,UniversityAffiliation $universityAffiliation)
    {
        $request->validate(['name'=>'required']);
        $universityAffiliation->update( \request()->all());
        $universityAffiliation->save();

        return redirect(route('university_affiliations.index'))->withSuccess('updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function destroy(UniversityAffiliation $universityAffiliation)
    {
        $universityAffiliation->delete();
        return redirect(route('university_affiliations.index'))->withSuccess('deleted successfully');
    }
}
