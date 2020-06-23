<?php

namespace App\Http\Controllers\Vue;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Tag;
use App\Initiative;
use App\Course;
use App\Ctag;

class MainDataController extends Controller
{
    // get Menu items
    public function menu()
    {

      $menu = DB::table('menu_items')->where('menu_id', 2)->select('id', 'title', 'icon_class', 'parent_id', 'url')->orderBy('order')->get();

      return $menu;

    }

    public function tags(Request $request)
    {
      if ($request->segment === 'news') {
        $tags = Tag::all();
      } elseif ($request->segment === 'courses') {
        $tags = Ctag::all();
      } else {
        return null;
      }
      $arr = collect();
      foreach ($tags as $tag) {
        $chunk = $tag->posts;
        $count = count($chunk);
        if ($count > 0) {
          $tag->setAttribute('count', $count);
          $tag = $tag->only(['count', 'id', 'title', 'slug']);
          $arr->push($tag);
        }
      }

      return $arr;
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

    // get Courses with filter
    public function courses(Request $request)
    {

      if ($request->tag != null) {
        $tag = Ctag::where('slug', $request->tag)->first();
        if ($tag != null) {
          $courses = $tag->posts()->where('status', 'PUBLISHED')
          ->orderBy('id', 'desc')
          ->skip($request->skip)
          ->take(4)->get();
        } else {
          $courses = null;
        }

      } else {
        $courses = Course::where('status', 'PUBLISHED')
        ->orderBy('id', 'desc')
        ->skip($request->skip)
        ->take(4)->get();
      }

      return $courses;

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
