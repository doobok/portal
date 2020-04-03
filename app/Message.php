<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\SendNotificationEvent;

class Message extends Model
{
  // author
  public function user()
  {
      return $this->belongsTo('App\User');
  }

  protected static function boot()
  {
      static::created(function($instance)
        {
          event(new SendNotificationEvent($instance));
        }

      );

      parent::boot();
  }
}
