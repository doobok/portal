<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  // author
  public function user()
  {
      return $this->belongsTo('App\User');
  }
}
