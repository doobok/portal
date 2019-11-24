<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

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



      return view('desktop.news.article', [
        'page' => $article,
        'articles' => $articles,
        'tags' => $article->tags,
      ]);
    }
}
