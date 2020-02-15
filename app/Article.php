<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  public function bookings()
  {
      return $this->belongsToMany('App\Booking', 'article_booking');
  }
}
