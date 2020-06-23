<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
  public function articles()
{
    return $this->belongsToMany('App\Article', 'article_booking');
}
}
