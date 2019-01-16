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
     * @param  \App\Affiliation  $nomination
     * @return \Illuminate\Http\Response
     */
    public function show(Affiliation $nomination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Affiliation  $nomination
     * @return \Illuminate\Http\Response
     */
    public function edit(Affiliation $nomination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Affiliation  $nomination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Affiliation $nomination)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Affiliation  $nomination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Affiliation $nomination)
    {
        //
    }
}
