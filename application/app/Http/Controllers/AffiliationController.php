<?php

namespace App\Http\Controllers;

use App\Affiliation;
use Illuminate\Http\Request;

class AffiliationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Affiliation::all();
        return view('affiliations.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('affiliations.create');
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

        Affiliation::create($request->all());

        return redirect(route('affiliations.index'))->withSuccess('created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Affiliation  $affiliation
     * @return \Illuminate\Http\Response
     */
    public function show(Affiliation $affiliation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Affiliation $affiliation
     * @return \Illuminate\Http\Response
     */
    public function edit(Affiliation $affiliation)
    {
        return view('affiliations.edit', compact('affiliation'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Affiliation  $affiliation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Affiliation $affiliation)
    {
        $request->validate(['name'=>'required']);
        $affiliation->update( \request()->all());
        $affiliation->save();
        return redirect(route('affiliations.index'))->withSuccess('updated successfully');
        //return redirect(route('affiliations.index'))->withSuccess('updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Affiliation $affiliation
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Affiliation $affiliation)
    {
        $affiliation->delete();
        return redirect(route('affiliations.index'))->withSuccess('deleted successfully ');
    }
}
