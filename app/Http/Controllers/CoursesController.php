<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoursesController extends Controller
{
  public function index(Request $request)
  {
    return view('desktop.courses.index');
  }

}