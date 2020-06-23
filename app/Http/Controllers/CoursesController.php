<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CoursesController extends Controller
{
  public function index(Request $request)
  {
    return view('desktop.courses.index');
  }

  public function article($id)
  {
    $article = Course::findOrFail($id);

    return view('desktop.courses.article', [
      'page' => $article,

    ]);
  }

}
