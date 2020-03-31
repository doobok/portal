<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\User;

class PagesController extends Controller
{
    public function index($slug)
    {
      $page = Page::where('slug', $slug)->first();

      return view('desktop.pages.index', [
        'page' => $page,

      ]);
    }

    // contacts
    public function contacts()
    {
      return view('desktop.pages.contacts');
    }

    // user public page
    public function publicUsProfile($id)
    {
      $article = User::where('name', $id)->select('id', 'name', 'avatar', 'created_at', 'salute', 'first_name', 'last_name')->first();
      if (!$article) {
        return back();
      }

      return view('desktop.userpanel.public-profile', [
        'page' => $article
      ]);
    }
}
