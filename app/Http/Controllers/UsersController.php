<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UsersController extends Controller
{
    public function __construct()
      {
          $this->middleware('auth');
      }

    // update user profile
    public function userUpdate(Request $request, $id)
    {
      $this->validate(request(), [
            'avatar' => 'sometimes|required|max:5000',
       ]);

       $user = User::findOrFail($id);

       // check premission fo update
       $this->authorize('update', $user);

       $user->first_name = request('first_name');
       $user->last_name = request('last_name');
       $user->phone = request('phone');
       $user->salute = request('salute');
       if ($request->avatarprsnt) {
         $user->avatar = request('avatar');
       }

       $user->save();

       return response()->json(null, 201);
    }

}
