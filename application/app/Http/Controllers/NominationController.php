<?php

namespace App\Http\Controllers;

use App\Nomination;
use Illuminate\Http\Request;

class NominationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Nomination::all();
        return view('nominations.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nominations.create');
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

        Nomination::create($request->all());

        return redirect(route('nominations.index'))->withSuccess('created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nomination  $nomination
     * @return \Illuminate\Http\Response
     */
    public function show(Nomination $nomination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nomination  $nomination
     * @return \Illuminate\Http\Response
     */
    public function edit(Nomination $nomination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nomination  $nomination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nomination $nomination)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nomination  $nomination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nomination $nomination)
    {
        //
    }
}
