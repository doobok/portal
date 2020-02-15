<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $now = \Carbon\Carbon::now();

        return view('home', [
          'user' => $user,
          'messages' => $user->messages->where('read', '==', NULL)->count(),
          'initiatives' => $user->initiatives->where('date_start', '>', $now),
          'subscribe_in' => $user->events->where('date_start', '>', $now),
        ]);
    }
    // user messages
    public function messages()
    {
        $user = Auth::user();

        return view('desktop.userpanel.messages', [
          'count' => $user->messages->where('read', '==', NULL)->count()
        ]);
    }

    // backet
    public function backet()
    {
        return view('desktop.userpanel.backet');
    }
}
