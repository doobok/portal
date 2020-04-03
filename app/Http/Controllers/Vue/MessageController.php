<?php

namespace App\Http\Controllers\Vue;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
  // add form
  public function sendMsg(Request $request)
  {
    // Get user
    $user = Auth::user();

    // Check user
    if ($user->id === $request->to) {
      return response()->json(null, 423);
    }

    // Save to DB
    $message = new Message;

    if ($request->subject) {
      $message->subject = $request->subject;
    } else {
      $message->subject = 'Приватне повідомлення від ' . $user->name;
      $message->from = $user->id;
    }

    $message->to = $request->to;
    $message->message = $request->message;
    $message->save();

    return response()->json(null, 201);
  }
  // check new messages
  public function check()
  {
      $user = Auth::user();
      $count = $user->messages->where('read', '==', NULL)->count();

      if ($count > 0) {
        return response()->json(null, 201);
      }
  }
  // get messages
  public function messages(Request $request)
  {
      $messages = Message::where('to', Auth::id())
      ->orderBy('id', 'desc')
      ->skip($request->skip)
      ->take(5)->get();

      return $messages;
  }
}
