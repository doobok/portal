<?php

namespace App\Listeners;

use App\Events\SendNotificationEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\GetMessage;

class SendNotificationListener
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
     * @param  SendNotificationEvent  $event
     * @return void
     */
    public function handle(SendNotificationEvent $event)
    {
      $notyfication = $event->notyfication;
      $user = User::where('id', $notyfication->to)->firstorfail();

      if ($user->email_verified_at != null) {
        Mail::to($user)->queue(new GetMessage($notyfication));
      }
    }
}
// queue
