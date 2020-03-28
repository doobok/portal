<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class TelegramPostNewsToChannel extends Notification
{
    use Queueable;


    public function __construct($post, $link)
     {
         $this->post = $post;
         $this->title = $post->title;
         $this->teaser = $post->teaser;
         $this->link = $link;

     }

     //class
      public function via($notifiable)
      {
          return [TelegramChannel::class];
      }

      //post
      public function toTelegram($notifiable)
      {

          return TelegramMessage::create()
              ->to('@' . setting('contacts.telegram_canal'))
              ->content("⭐⭐⭐⭐⭐ \n*$this->title* \n$this->teaser \n$this->link");
      }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
