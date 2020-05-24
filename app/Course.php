<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  public function ctags()
  {
      return $this->belongsToMany('App\Ctag');
  }
}
