<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;

class NewsController extends Controller
{
    public function index(Request $request)
    {
      // $articles = Post::where('slug', $slug)->where('status', 'PUBLISHED')->first();

      return view('desktop.news.index', [
        // 'articles' => $articles
      ]);
    }

    public function article($slug)
    {
      $article = Post::where('slug', $slug)->where('status', 'PUBLISHED')->first();
      $articles = Post::where('status', 'PUBLISHED')->where('id', '!=', $article->id)->orderBy('created_at', 'desc')->limit(6)->get();

      $created = $article->created_at;
      $created = Carbon::parse($created);
      $created = $created->diffForHumans();



      return view('desktop.news.article', [
        'page' => $article,
        'created' => $created,
        'articles' => $articles,
        'tags' => $article->tags,
      ]);
    }
}
