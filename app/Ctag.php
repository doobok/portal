<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ctag extends Model
{
  public function posts()
  {
      return $this->belongsToMany('App\Course');
  }
}
