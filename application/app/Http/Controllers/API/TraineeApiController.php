<?php

namespace App\Http\Controllers;

use App\Trainee;
use Illuminate\Http\Request;

class TraineeApiController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        dump($request);
        dump($_REQUEST);
        dump($_POST);
        dump($_GET);
        dump($request->q);
//        exit('');
//        $q = request('q');
        $all = $request->all();
//        $q = $request->json('q');
        $q = $request->q;
//        $q = $request->get('q');
        $qq = $request->query('q');
//        $qqq = $request->input('q');
//        $term = Input::get('term');
//        dd([$all ,$q, $qq, $qqq]);
//        dd([$q]);
        $items = [];
//        $items = Trainee::all();
        if ($q){
            $items = Trainee::where('name', 'like', '%'.$q.'%')
                ->orWhere('phone', '%'.$q.'%')
                ->orWhere('identity', '%'.$q.'%')
                ->orWhere('email', '%'.$q.'%')
                ->get();
        }
        return response()->json($items);
    }
}
