<?php

namespace App\Http\Controllers\Vue;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Tag;
use App\Initiative;

class MainDataController extends Controller
{
    // get Menu items
    public function menu()
    {

      $menu = DB::table('menu_items')->where('menu_id', 2)->select('id', 'title', 'icon_class', 'parent_id', 'url')->orderBy('order')->get();

      return $menu;

    }

    public function tags()
    {
      $tags = Tag::all();

      return $tags;
    }

    // get News with filter
    public function news(Request $request)
    {

      if ($request->tag != null) {
        $tag = Tag::where('slug', $request->tag)->first();
        if ($tag != null) {
          $news = $tag->posts()->where('status', 'PUBLISHED')
          ->orderBy('id', 'desc')
          ->skip($request->skip)
          ->take(4)->get();
        } else {
          $news = null;
        }

      } else {
        $news = Post::where('status', 'PUBLISHED')
        ->orderBy('id', 'desc')
        ->skip($request->skip)
        ->take(4)->get();
      }

      return $news;

    }

    // get Initiatives
    public function initiatives(Request $request)
    {
        $now = \Carbon\Carbon::now();

        $params = [];
          if ($request->period) {
            array_push($params, ['date_start', '<=', $now]);
          } else {
          array_push($params, ['date_start', '>', $now]);
          }

        $initiatives = Initiative::where('status', 'published')
        ->where($params)
        ->orderBy('date_start', 'asc')
        ->skip($request->skip)
        ->take(4)->get();

      return $initiatives;

    }

    public function now()
    {
      return \Carbon\Carbon::now()->toDateTimeString();
    }
}
