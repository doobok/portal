<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Carbon\Carbon;

class EventsController extends Controller
{
  public function index(Request $request)
  {
    $now = \Carbon\Carbon::now();

    $articles = Event::where('status', 'PUBLISHED')->where('date_start', '>=', $now)->get();

    return view('desktop.events.index', [
      'articles' => $articles,
    ]);
  }

  public function article($id)
  {
    $article = Event::findOrFail($id);

    // formating date
    $date = Carbon::createFromDate($article->date_start);
    $date = $date->format('d-m-Y \\о h:i');

    // check countdown
    $now = Carbon::now()->toDateTimeString();
    $countdown = null;
    if ($now > $article->date_start) {
      $countdown = 1;
    } else {
      $countdown = $article->date_start;
    }

    return view('desktop.events.article', [
      'page' => $article,
      'countdown' => $countdown,
      'date' => $date,

    ]);
  }
}
