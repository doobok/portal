<?php

namespace App\Http\Controllers\Vue;

use App\Article;
use App\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BacketController extends Controller
{
  public function getItems(Request $request)
  {
      $items = Article::where('user_id', Auth::id())->where('status', 'new')->get();

      return $items;
  }

  public function addItem(Request $request)
  {
      $item = new Article;

      $item->user_id = Auth::id();
      $item->title = $request->title;
      $item->price = $request->price;
      $item->model = $request->model;
      $item->model_id = $request->model_id;
      $item->status = 'new';
      $item->uri = url()->previous();
      $item->save();

      return $item;

  }

  // удаление из корзины
  public function remove(Request $request, $id)
  {
    $item = Article::findOrFail($id);
    $item->delete();

    return response()->json(['success' => 'true']);
  }

  public function bookItems(Request $request)
  {
      // добавляем запись в БД
      $booking = new Booking;
      $booking->user_id = Auth::id();
      $booking->price = $request->price;
      $booking->save();

      // получаем все елементы корзины
      $article = Article::where('user_id', Auth::id())->where('status', 'new')->get();

      // перебор и присвоение
      foreach ($article as $item) {
        $booking->articles()->attach($item->id);
        $item->status = 'book';
        $item->save();
      }

      return response()->json(null, 202);
    }
}
