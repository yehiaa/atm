<?php

namespace App\Http\Controllers;

use App\Hall;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        $resources = Hall::where('is_active', true)->get(['id', 'name as title']);
//        $lectrues = Lecture::
        return view('calendar.index', compact('resources'));
    }
}
