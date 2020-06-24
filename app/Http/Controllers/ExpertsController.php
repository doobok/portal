<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expert;

class ExpertsController extends Controller
{
    public function index(Request $request)
    {

      return view('desktop.experts.index', [
        // 'articles' => $articles,
      ]);
    }

    public function experts(Request $request)
    {
        $experts = Expert::where('active', '=', true)
        ->orderBy('rang', 'desc')
        ->skip($request->skip)
        ->take(4)->get();

        return $experts;
    }
}
