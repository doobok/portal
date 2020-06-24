<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ExpertFormRules;
use App\Expert;
use Illuminate\Support\Facades\Auth;

class ExpertsController extends Controller
{
    public function index(Request $request)
    {

      return view('desktop.experts.index', [
        // 'articles' => $articles,
      ]);
    }

    // vue data
    public function experts(Request $request)
    {
        $experts = Expert::where('active', '=', true)
        ->orderBy('rang', 'desc')
        ->skip($request->skip)
        ->take(4)->get();

        return $experts;
    }

    // view add form
    public function add()
    {
      return view('desktop.experts.add');
    }

    // add form
    public function addForm(ExpertFormRules $request)
    {

      // save to DB
      $event = new Expert;
      $event->name = $request->name;
      $event->speciality = $request->speciality;
      $event->skills = $request->skills;
      $event->bio = $request->bio;
      $event->image = $request->image;
      $event->rang = 1;
      $event->user_id = Auth::id();
      $event->save();

      return response()->json(null, 201);
    }
}
