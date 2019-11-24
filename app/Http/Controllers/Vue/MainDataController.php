<?php

namespace App\Http\Controllers\Vue;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;

class MainDataController extends Controller
{
    public function menu()
    {

      $menu = DB::table('menu_items')->where('menu_id', 2)->select('id', 'title', 'icon_class', 'parent_id', 'route')->orderBy('order')->get();
      return $menu;

    }

    public function news()
    {

      $news = Post::where('status', 'PUBLISHED')->orderBy('created_at', 'desc')->limit(6)->get();
      return $news;

    }
}
