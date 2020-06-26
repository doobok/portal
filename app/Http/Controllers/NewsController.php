<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Traits\UniqueModelSlug;

class NewsController extends Controller
{
    use UniqueModelSlug;

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

    // view add form
    public function add()
    {
      return view('desktop.news.add');
    }

    // add form
    public function addForm(Request $request)
    {

      // save to DB
      $post = new Post;
      $post->title = $request->title;
      $post->teaser = $request->teaser;
      $post->body = $request->body;
      $post->image = $request->image;
      $post->status = 'DRAFT';
      $post->user_id = Auth::id();
      // unique slug generate
      $post->slug = $this->generateSlug(
            Post::class,
            $request->title
        );
      $post->save();

      return response()->json(null, 201);
    }
}
