<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InitiativeFormRules;
use Carbon\Carbon;
use App\Initiative;
use App\User;
use Illuminate\Support\Facades\Auth;

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
      // get initiative
      if (Auth::check()) {
        $article = Initiative::findOrFail($id);
        // check permissions
        if ($article->status != 'published') {
          $this->authorize('view', $article);
        }
      } else {
        $article = Initiative::where('status', 'published')->findOrFail($id);
      }

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
        'subscribers' => $article->users,

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

    public function subscribe(Request $request)
    {
      // get initiative
      $initiative = Initiative::findOrFail($request->id);
      // check availability
      if ($initiative->vac_num != null AND $initiative->vac_num <= $initiative->vac_res) {
        return response()->json('Невдача! Ініціатива вже заповнена');
      }
      // check subscribe
      if (Auth::user()->events()->where('id', $request->id)->first()) {
        return response()->json('Ви вже долучилися до цієї ініціативи');
      }

      // attach subscriber to initiative
      $user = Auth::user()->events()->save($initiative);

      // change count of subscribers
      $initiative->vac_res++;
      $initiative->save();

      return response()->json('Ви успішно долучились до ініціативи');
    }

    public function unsubscribe(Request $request)
    {
      // find user
      if ($request->user_id) {
        $user = User::find($request->user_id);
      } else {
        $user = Auth::user();
      }

      // detach subscriber from initiative
      $user->events()->detach($request->id);

      // change count of subscribers
      $initiative = Initiative::findOrFail($request->id);
      $initiative->vac_res--;
      $initiative->save();

      return response()->json('Відписка успішна');
    }

    // get subscribe status
    public function status(Request $request)
    {
      $initiative = Initiative::findOrFail($request->id);
      // check subscribe
      if (Auth::user()->events()->where('id', $request->id)->first()) {
        return response()->json('Ви вже долучилися', 202);
      }
      // check availability
      if ($initiative->vac_num) {
        if ($initiative->vac_num <= $initiative->vac_res) {
          return response()->json('Ініціатива заповнена');
        }
      }
      // return succes
      return response()->json(null, 201);
    }

    public function update(Request $request, $id)
    {
      $initiative = Initiative::findOrFail($id);
      $initiative->fill($request->all());
      $initiative->save();

      return response()->json(null, 202);
    }
}
