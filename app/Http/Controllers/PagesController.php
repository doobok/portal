<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PagesController extends Controller
{
    public function index($slug)
    {
      $page = Page::where('slug', $slug)->first();


      return view('desktop.pages.index', [
        'page' => $page,

      ]);
    }
}
