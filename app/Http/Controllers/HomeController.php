<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Message;

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
    // chat messages
    public function messageChat($id)
    {
        // Get message
        $message = Message::findOrFail($id);

        // Check user premission
        if (Auth::id() != $message->to)
           {
               return redirect()->back();
           }
        // Check system notification
        if ($message->from === null) {
            $name = 'system';
            $active = 0;
        } else {
          // Get sender
          $sender = User::where('id', $message->from)->first();
          if (!$sender) {
            $name = 'deleted';
            $active = 0;
          } else {
            $name = $sender->name;
            $active = 1;
          }
        }

        // Get messages
        $messages = Message::where([
          ['to', '=', $message->to],
          ['from', '=', $message->from]
        ])->orWhere([
          ['to', '=', $message->from],
          ['from', '=', $message->to]
          ])->orderBy('id', 'desc')
          ->get();

        // mark read
        $unread = Message::where([
          ['to', '=', $message->to],
          ['from', '=', $message->from]
        ])->where('read', '=', null)->update(['read' => 1]);

        return view('desktop.userpanel.message-chat', [
          'message' => $message,
          'sender' => $name,
          'active' => $active,
          'messages' => $messages,
        ]);
    }

    // backet
    public function backet()
    {
        return view('desktop.userpanel.backet');
    }

    // user profile edit
    public function editProfile()
    {
        return view('desktop.userpanel.useredit');
    }


}
