<?php

namespace App\Http\Controllers;

use App\Speciality;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Speciality::all();
        return view('specialities.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('specialities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Speciality  $specialiy
     * @return \Illuminate\Http\Response
     */
    public function show(Speciality $specialiy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Speciality  $specialiy
     * @return \Illuminate\Http\Response
     */
    public function edit(Speciality $specialiy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Speciality  $specialiy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Speciality $specialiy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Speciality  $specialiy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Speciality $specialiy)
    {
        //
    }
}
