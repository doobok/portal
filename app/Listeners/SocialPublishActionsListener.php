<?php

namespace App\Listeners;

use App\Events\SocialPublishEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TelegramPostNewsToChannel;

class SocialPublishActionsListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SocialPublishEvent  $event
     * @return void
     */
    public function handle(SocialPublishEvent $event)
    {
      $post = $event->post;
      $link = route('article', ['slug' => $event->post->slug]);

      if (setting('service.notifications') == true) {
        //telegram
        Notification::send('', new TelegramPostNewsToChannel($post, $link));

      }
    }
}
