<?php

namespace App\Http\Controllers;

use App\Hall;
use App\Lecture;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        $resources = Hall::where('is_active', true)->get(['id', 'name as title']);
        $lectures = Lecture::get(['id', 'name as title', 'hall_id as resourceId', 'start_datetime as start', 'end_datetime as end']);
        return view('calendar.index', compact('resources', 'lectures'));
    }
}
