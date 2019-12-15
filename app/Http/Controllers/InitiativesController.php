<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InitiativeFormRules;
use Carbon\Carbon;
use App\Initiative;

class InitiativesController extends Controller
{
    public function index(Request $request)
    {
      $articles = Initiative::where('status', 'new')->take(6)->get();
      return view('desktop.initiatives.index', [
        'articles' => $articles,
      ]);
    }

    public function article($id)
    {
      $article = Initiative::findOrFail($id);

      // get date
      $date = Carbon::createFromDate($article->date_start);
      $date = $date->format('d-m-Y \\о h:i');

      // get countdown time
      $now = Carbon::now()->toDateTimeString();
      $countdown = null;
      if ($now > $article->date_start) {
        $countdown = 1;
      } else {
        if ($article->date_regfinish) {
          if ($now < $article->date_regfinish) {
            $countdown = $article->date_regfinish;
          }
        } else {
          $countdown = $article->date_start;
        }
      }

      return view('desktop.initiatives.article', [
        'page' => $article,
        'date' => $date,
        'countdown' => $countdown,
        'author' => $article->user,

      ]);

    }

    // view add form
    public function add()
    {
      return view('desktop.initiatives.add');
    }

    // add form
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
