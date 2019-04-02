<?php

namespace App\Http\Controllers;

use App\Course;
use App\Hall;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('evaluation.index', compact('courses'));
    }

    public function create(Course $course)
    {
        return view('evaluation.create', compact('course'));
    }
}
