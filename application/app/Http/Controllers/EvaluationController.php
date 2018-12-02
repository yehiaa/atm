<?php

namespace App\Http\Controllers;

use App\Hall;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index()
    {
//        $resources = Hall::where('is_active', true)->get(['id', 'name as title']);

        return view('evaluation.index');
    }
}
