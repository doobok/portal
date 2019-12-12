<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InitiativeFormRules;
use App\Initiative;

class InitiativesController extends Controller
{
    public function index(Request $request)
    {
      return view('desktop.initiatives.index');
    }

    public function add()
    {
      return view('desktop.initiatives.add');
    }

    public function addForm(InitiativeFormRules $request)
    {

      // save to DB
      $event = new Initiative;
      $event->title = $request->title;
      $event->teaser = $request->teaser;
      $event->body = $request->body;
      $event->image = $request->image;
      $event->status = 'new';
      $event->vac_num = $request->vac_num;
      $event->vac_res = $request->vac_res;
      $event->user_id = $request->user_id;
      $event->date_regfinish = $request->date_regfinish;
      $event->date_start = $request->date_start;
      $event->save();

      return response()->json(null, 201);
    }
}
