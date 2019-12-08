<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InitiativesController extends Controller
{
    public function index(Request $request)
    {
      return view('desktop.initiatives.index');
    }
}
